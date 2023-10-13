<?php

class Episode
{
    private int $id;
    private string $name;
    private string $episodeNumber;
    private float $averageRating = 0.0;
    private int $submissionsCount = 0;

    public function __construct(int $id, string $name, string $episodeNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->episodeNumber = $episodeNumber;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEpisodeNumber(): string
    {
        return $this->episodeNumber;
    }

    public function setRating(float $rating): void
    {
        if ($rating >= 1 && $rating <= 10) {
            $this->averageRating = ($this->averageRating * $this->submissionsCount + $rating) / ($this->submissionsCount + 1);
            $this->submissionsCount++;
        }
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }
}

class EpisodeList
{
    private array $episodeList = [];
    private array $episodeListData = [];

    public function addEpisodes(): void
    {
        $apiUrl = "https://rickandmortyapi.com/api/episode?page=1";
        $data = json_decode(file_get_contents($apiUrl), true);

        if (isset($data['results'])) {
            $this->episodeListData = $data['results'];
        } else {
            echo "No episodes found." . PHP_EOL;
            return;
        }

        if (isset($data['info']['next'])) {
            $page = 2;

            while ($data['info']['next']) {
                $url = "https://rickandmortyapi.com/api/episode?page=" . $page;
                $data = json_decode(file_get_contents($url), true);

                if (isset($data['results'])) {
                    $this->episodeListData = array_merge($this->episodeListData, $data['results']);
                }
                $page++;
            }
        }

        foreach ($this->episodeListData as $episodeData) {
            $newEpisode = new Episode(count($this->episodeList) + 1, $episodeData['name'], $episodeData['episode']);
            $this->episodeList[] = $newEpisode;

            $randomRating = rand(1, 10);
            $newEpisode->setRating($randomRating);
        }
    }

    public function listEpisodes(): array
    {
        return $this->episodeList;
    }
}

class RatingManager
{
    private array $episodeRatings = [];
    private string $ratingsFile = 'ratings.json'; // Change the file extension to .json

    public function __construct()
    {
        $this->loadEpisodeRatings();
    }

    public function getEpisodeRatings(): array
    {
        return $this->episodeRatings;
    }

    public function loadEpisodeRatings(): void
    {
        if (file_exists($this->ratingsFile)) {
            $ratingsData = file_get_contents($this->ratingsFile);
            if (!empty($ratingsData)) {
                $this->episodeRatings = json_decode($ratingsData, true);
            }
        }
    }

    public function saveEpisodeRatings(): void
    {
        $ratingsData = json_encode($this->episodeRatings);
        file_put_contents($this->ratingsFile, $ratingsData);
    }

    public function rateEpisode(Episode $episode, float $rating): void
    {
        $episodeNumber = $episode->getEpisodeNumber();
        $this->episodeRatings[$episodeNumber] = $rating;
        $this->saveEpisodeRatings();

    }

    public function saveRatingsToFile(array $episodes): void
    {
        $ratings = [];
        foreach ($episodes as $episode) {
            $ratings[] = [
                'id' => $episode->getId(),
                'rating' => $episode->getAverageRating(),
            ];
        }

        $ratingsData = json_encode($ratings);
        file_put_contents($this->ratingsFile, $ratingsData);
    }
}

class Application
{
    private EpisodeList $episodeList;
    private RatingManager $ratingManager;

    public function __construct(EpisodeList $episodeList, RatingManager $ratingManager)
    {
        $this->episodeList = $episodeList;
        $this->ratingManager = $ratingManager;
    }

    public function run(): void
    {
        $this->episodeList->addEpisodes();
        while (true) {
            echo "Welcome to The Rick and Morty show\n";
            echo "Choose the operation you want to perform\n";
            echo "Choose 0 to display a full list of Rick and Morty episodes\n";
            echo "Choose 1 to rate the Rick and Morty show episodes\n";
            echo "Choose 2 to display a full list of Rick and Morty episodes by ratings\n";
            echo "Choose 3 for EXIT\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    $this->displayAllEpisodes();
                    break;
                case 1:
                    $this->rateEpisodes();
                    $this->ratingManager->saveRatingsToFile($this->episodeList->listEpisodes());
                    break;
                case 2:
                    $this->displayRatingsFromFile();
                    break;
                case 3:
                    echo "Bye!\n";
                    die;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }

    private function displayAllEpisodes(): void
    {
        $episodes = $this->episodeList->listEpisodes();

        if (empty($episodes)) {
            echo "No episodes found. Please make sure to add episodes first.\n";
            return;
        }

        echo "Episodes List:\n";

        foreach ($episodes as $episode) {
            echo "ID: {$episode->getId()} | {$episode->getName()} | {$episode->getEpisodeNumber()}\n";
        }
    }

    private function rateEpisodes(): void
    {
        echo "Choose an episode to rate by its index: ";
        $episodeIndex = (int)readline();
        $episodes = $this->episodeList->listEpisodes();

        if (isset($episodes[$episodeIndex])) {
            $episode = $episodes[$episodeIndex];
            echo "Rate this episode from 1 to 10: ";
            $rating = (float)readline();
            if ($rating < 1 || $rating > 10) {
                echo "Invalid rating. Please enter a rating between 1 and 10.\n";
            } else {
                $episode->setRating($rating);
                $this->ratingManager->rateEpisode($episode, $rating);
                echo "You rated '{$episode->getName()}' with $rating.\n";
                $this->ratingManager->saveRatingsToFile($episodes); // Save ratings to the file
            }
        } else {
            echo "Invalid episode index.\n";
        }
    }

    public function displayRatingsFromFile(): void
    {
        $ratingsFile = 'ratings.json'; // Change the file extension to .json

        if (file_exists($ratingsFile)) {
            $ratingsData = file_get_contents($ratingsFile);
            $ratings = json_decode($ratingsData, true);

            echo "Ratings from 'ratings.json' file:\n";
            foreach ($ratings as $rating) {
                echo "Episode ID: {$rating['id']}, Rating: {$rating['rating']}\n";
            }
        } else {
            echo "'ratings.json' file not found.\n";
        }
    }

}

$episodeList = new EpisodeList();
$ratingManager = new RatingManager();
$application = new Application($episodeList, $ratingManager);
$application->run();
