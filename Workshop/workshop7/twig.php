<?php
// Point to library
require_once 'vendor/autoload.php';

// Set up Environment
$loader = new \Twig\Loader\FilesystemLoader('.');
$twig = new \Twig\Environment($loader);

// Array of data
$people[0]['FirstName'] = "Alix";
$people[0]['Surname'] = "Bergeret";
$people[1]['FirstName'] = "Hiran";
$people[1]['Surname'] = "Patel";

// Load and render template
echo $twig->render('template.html', 
                   array('a_variable' => 'Alix', 
                         'another_variable' => 'Bergeret',
                         'people' => $people));
?>









<!-- Notes about the code
-	This line specifies where Twig is installed (via require_once). This might be different depending on where you have installed it in the previous step.
-	This line specifies where your templates folder is (in this case the current folder, aka ".", but you could put your templates in a sub-folder).
-	Here, you create a new environment to work with. Note: During development it is best NOT to use caching, as you would not see your changes when updating a template. Only enable caching once the website is finished and deployed.
-	Finally, you “render” your template, passing the name of the template file as the first parameter, and your data as the second parameter - in this case 2 string values ("Alix" and "Bergeret") and an array called $people (defined just before the render command). -->
