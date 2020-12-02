<?php
//Require music data to use the db variable in this file
require_once 'includes/database.php';

if(!isset($_GET['index']) || $_GET['index'] == '')
{
    header('Location: index.php');
}

// Get the id from the url
$index = $_GET['index'];

// create a query to select the album from the database
$query = "SELECT * FROM albums WHERE id = $index";

// execute the query on the db
$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

// If all goes well, the db returns a table result with 1 row
// Fetch the row

while($row = mysqli_fetch_assoc($result))
{
    $albums[] = $row;
}

// Close the db connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section>
    <?php foreach ($albums as $album){?>
    <h1><?= $album['name']?></h1>
    <ul>
        <img src="<?php echo $album['img'] ?>" alt=""></li>
        <li>Genre: <?php echo $album['genre'] ?></li>
        <li>Year: <?php echo $album['year']  ?></li>
        <li>Tracks: <?php echo $album['tracks'] ?></li>
        <li><a href="index.php">Go back to the list</a></li>
    </ul>
    <?php } ?>
</section>
</body>
</html>











