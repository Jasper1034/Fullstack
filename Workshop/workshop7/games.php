<?php

// Point to library
require_once 'vendor/autoload.php';

// Set up Environment
$loader = new \Twig\Loader\FilesystemLoader('.');
$twig = new \Twig\Environment($loader);

include("db.php");

// Run SQL query
$sql = "SELECT * FROM videogames ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);

// How many rows were returned?
$num_rows = mysqli_num_rows($results);

// Load and render template
echo $twig->render('games.html', 
                   array('num_rows' => $num_rows, 'results' => $results));
?>



<!-- This example is very similar to our previous one.
-	First, we set Twig up.
-	Next, we connect to our MySQL database and select our videogames. 
-	Finally, we render our template, and pass our number of rows and database records as a second parameter -->
