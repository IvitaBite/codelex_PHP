<?php


/* Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
The program shall print "Coza" in place of the numbers which are multiples of 3, "Loza" for multiples of 5,
"Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on. The output shall look like:

1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza
*/

for ($i = 1; $i <= 110; $i++) {
    $output = "";
    if ($i % 3 === 0) {
        $output .= "Coza";
    }
    if ($i % 5 === 0) {
        $output .= "Loza";
    }
    if ($i % 7 == 0) {
        $output .= "Woza";
    }
    if ($i % 3 === 0 && $i % 5 == 0) {
        $output .= "CozaLoza";
    }
    if ($i % 11 === 0) {
        $output .= "\n";
    }
    if (empty($output)) {
        $output .= $i;
    }
    echo $output . " ";
}

// Ternary Operatorie
/*
for ($i = 1; $i <= 110; $i++) {
    $output = (($i % 3 === 0) ? "Coza" : "") .
        (($i % 5 === 0) ? "Loza" : "") .
        (($i % 7 == 0) ? "Woza" : "") .
        (($i % 3 === 0 && $i % 5 == 0) ? "CozaLoza" : "") .
        (($i % 11 === 0) ? "\n" : "") .
        ((empty($output)) ? $i : "");
    echo $output . " ";
}
*/

/*
$min = readline("From the number: ");
$max = readline("Up to the number: ");

for ($i = $min; $i <= $max; $i++) {
    $output = "";

    if ($i % 3 === 0) {
        $output .= "Coza";
    }
    if ($i % 5 === 0) {
        $output .= "Loza";
    }
    if ($i % 7 === 0) {
        $output .= "Woza";
    }
    if ($i % 3 === 0 && $i % 5 === 0) {
        $output .= "CozaLoza";
    }
    if ($i % 11 === 0) {
        $output .= "\n";
    }
    if (empty($output)) {
        $output .= $i;
    }
    echo $output . " ";
}
*/



