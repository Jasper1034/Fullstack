



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <style>
    body{
        margin: 100px;
    }
  </style>
<body>
    
<h1>List of ALL my games!!!</h1>
<br>
<?php
// Connect to database
include("db.php");
// Run SQL query
$sql = "SELECT * FROM videogames ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);
?>

<div class="Search-button">
    <input type="text" class name="keywords" placeholder="Search">

    <input type="submit" class="btn btn-primary" value="Go!">
</div>

<br>


<form action="search-games.php" method="post">

<table class="table table-striped">
<?php while($a_row = mysqli_fetch_assoc($results)):?>
<tr>
<td><a href="game-details.php?id=<?=$a_row['game_id']?>"><?=$a_row['game_name']?></a></td>

<td><?=$a_row['rating']?></td>
<td><a class="btn btn-outline-danger" href="delete-game.php?id=<?=$a_row['game_id']?>" role="button">Delete</a></td>
</tr>
<?php endwhile;?>

</table>

<a href="add-game-form.php" class="btn btn-primary">Add a game</a>

</form>

</body>


<!-- 2.
The code in grey was already there, don’t type it again.
b) The code in red adds an HTML hyperlink (more information here) around our game
name. It points to a page that doesn’t exist yet (we’ll do this shortly), passing the ID of
each game to it. Try inspecting the code in your web browser – you should see -->





<!-- notes on the code 1.

First, we include our “db.php” file, in order to connect to our MySQL database.
b) Then, we run an SQL statement that selects all games from our “videogames” tables,
ordered by release date.
c) Finally, using a “while” and the “mysqli_fetch_assoc” command, we loop through the
records, and display specific fields onto the screen. -->


</html