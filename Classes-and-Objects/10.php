<?php
/*
See video-store.php
class Application
{
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies()
    {
        //todo
    }

    private function rent_video()
    {
        //todo
    }

    private function return_video()
    {
        //todo
    }

    private function list_inventory()
    {
        //todo
    }
}

class VideoStore
{

}

class Video
{

}

$app = new Application();
$app->run();

The goal of this optional exercise is to design and implement a simple inventory control system for
    a small video rental store. Define least two classes: a class Video to model a video and a
class VideoStore to model the actual store.

Assume that a Video may have the following state:

A title;
a flag to say whether it is checked out or not; and
an average user rating.
In addition, Video has the following behaviour:

being checked out;
being returned;
receiving a rating.
The VideoStore may have the state of videos in there currently. The VideoStore will have the following behaviour:

add a new video (by title) to the inventory;
check out a video (by title);
return a video to the store;
take a user's rating for a video;
list the whole inventory of videos in the store.
Finally, create a VideoStoreTest which will test the functionality of your other two classes.
It should allow the following:

Add 3 videos: "The Matrix", "Godfather II", "Star Wars Episode IV: A New Hope".
Give several ratings to each video.
Rent each video out once and return it.
List the inventory after "Godfather II" has been rented out out.
Summary of design specs:

Store a library of videos identified by title.
Allow a video to indicate whether it is currently rented out.
Allow users to rate a video and display the percentage of users that liked the video.
Print the store's inventory, listing for each video:
    its title,
the average rating,
and whether it is checked out or on the shelves.
*/


class Video
{
    private string $title;
    private bool $isCheckedOut = false;
    private float $averageRating = 0.0;
    private int $totalRating = 0;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCheckedOut(): bool
    {
        return $this->isCheckedOut;
    }

    public function checkOut(): void
    {
        $this->isCheckedOut = true;
    }

    public function returnVideo(): void
    {
        $this->isCheckedOut = false;
    }

    public function getAverageRating(): float
    {
        if ($this->totalRating === 0) {
            return 0.0;
        }
        return $this->averageRating;
    }

    public function addRating(float $rating): void
    {
        $this->averageRating = ($this->getAverageRating() * $this->totalRating + $rating) / ($this->totalRating + 1);
        $this->totalRating++;
    }
}

class MoviePlatform
{
    private string $name;
    private array $movies = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addMovie(Video $movie): void
    {
        $this->movies[] = $movie;
    }

    public function listMovies(): void
    {
        echo "Movies on {$this->getName()}:\n";
        foreach ($this->movies as $movie) {
            echo "Title: {$movie->getTitle()}\n";
            echo "Average Rating: {$movie->getAverageRating()}\n";
            echo "Checked Out: " . ($movie->isCheckedOut() ? "Yes" : "No") . "\n";
            echo "-------------------------\n";
        }
    }

    public function getMovies(): array
    {
        return $this->movies;
    }
}

class Application
{
    private array $platforms = [];

    public function run()
    {
        $this->initializePlatforms();

        while (true) {
            echo "Choose the operation you want to perform\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to list platforms and movies\n";
            echo "Choose 2 to rent a movie\n";
            echo "Choose 3 to return a movie\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!\n";
                    die;
                case 1:
                    $this->listPlatformsAndMovies();
                    break;
                case 2:
                    $this->rentMovie();
                    break;
                case 3:
                    $this->returnMovie();
                    break;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }

    private function initializePlatforms()
    {
        $netflix = new MoviePlatform('Netflix');
        $disney = new MoviePlatform('Disney');
        $hbo = new MoviePlatform('HBO');

        // Add movies to platforms
        $this->addMoviesToPlatform($netflix, [
            "Reptile" => 2.3,
            "The Black Book" => 4.7,
            "Spy Kids: Armageddon" => 2.8,
            "Love at First Sight" => 4.6,
            "In Time" => 3.0,
        ]);

        $this->addMoviesToPlatform($disney, [
            "Snow White and the Seven Dwarfs" => 4.9,
            "Dumbo" => 4.7,
            "Victory Through Air Power" => 3.8,
            "The Sign of Zorro" => 3.6,
            "The Rescue" => 3.0,
        ]);

        $this->addMoviesToPlatform($hbo, [
            "Dune" => 4.9,
            "Right of Way" => 3.7,
            "Apology" => 3.3,
            "Steal the Sky" => 4.6,
            "The Heist" => 4.0,
        ]);

        $this->platforms['Netflix'] = $netflix;
        $this->platforms['Disney'] = $disney;
        $this->platforms['HBO'] = $hbo;
    }

    private function addMoviesToPlatform(MoviePlatform $platform, array $moviesWithRatings)
    {
        foreach ($moviesWithRatings as $title => $rating) {
            $movie = new Video($title);
            $movie->addRating($rating);
            $platform->addMovie($movie);
        }
    }

    private function listPlatformsAndMovies()
    {
        foreach ($this->platforms as $platform) {
            /** @var MoviePlatform $platform . */
            $platform->listMovies();
            echo "#############################\n";
        }
    }

    private function rentMovie()
    {
        echo "Enter the name of the platform (Netflix, Disney, HBO): ";
        $platformName = readline();
        if (!isset($this->platforms[$platformName])) {
            echo "Invalid platform.\n";
            return;
        }

        $platform = $this->platforms[$platformName];

        echo "Movies available on {$platformName}:\n";
        foreach ($platform->getMovies() as $movie) {
            echo "Title: {$movie->getTitle()}\n";
            echo "Average Rating: {$movie->getAverageRating()}\n";
            echo "Checked Out: " . ($movie->isCheckedOut() ? "Yes" : "No") . "\n";
            echo "-------------------------\n";
        }

        echo "Enter the title of the movie you want to rent: ";
        $title = readline();

        $movies = $platform->getMovies();
        foreach ($movies as $movie) {
            if ($movie->getTitle() === $title) {
                if (!$movie->isCheckedOut()) {
                    $movie->checkOut();
                    echo "Rented: {$title}\n";
                } else {
                    echo "Sorry, {$title} is already checked out.\n";
                }
                return;
            }
        }

        echo "{$title} not found on {$platformName}.\n";
    }

    private function returnMovie()
    {
        echo "Enter the name of the platform (Netflix, Disney, HBO): ";
        $platformName = readline();
        if (!isset($this->platforms[$platformName])) {
            echo "Invalid platform.\n";
            return;
        }

        $platform = $this->platforms[$platformName];

        echo "Enter the title of the movie you want to return: ";
        $title = readline();

        $movies = $platform->getMovies();
        foreach ($movies as $movie) {
            if ($movie->getTitle() === $title) {
                if ($movie->isCheckedOut()) {
                    $movie->returnVideo();
                    echo "Returned: {$title}\n";

                    // Ask the user to rate the movie
                    echo "Rate this movie from 0 to 5 stars: ";
                    $rating = (float)readline();
                    if ($rating >= 0 && $rating <= 5) {
                        $movie->addRating($rating);
                        echo "Rated: {$title} - {$rating} stars\n";
                    } else {
                        echo "Invalid rating. Please enter a rating between 0 and 5.\n";
                    }

                } else {
                    echo "{$title} is not checked out.\n";
                }
                return;
            }
        }
        echo "{$title} not found on {$platformName}.\n";
    }
}

$application = new Application();
$application->run();


