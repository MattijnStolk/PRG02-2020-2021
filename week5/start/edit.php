<?php
//Require db
require_once "includes/database.php";

//TODO: Handle POST data & store in DB
if (isset($_POST['submit'])) {

    //post back with
    $id     = mysqli_escape_string($db, $_POST['id']);
    $name   = mysqli_escape_string($db, $_POST['name']);
    $artist = mysqli_escape_string($db, $_POST['artist']);
    $genre  = mysqli_escape_string($db, $_POST['genre']);
    $year   = mysqli_escape_string($db, $_POST['year']);
    $tracks = mysqli_escape_string($db, $_POST['tracks']);

    //Require the form validation handling
    require_once 'includes/form-validation.php';

    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $album = [
        'artist' => $artist,
        'name' => $name,
        'genre' => $genre,
        'year' => $year,
        'tracks' => $tracks,
    ];

    if (empty($errors)){
        //Save the record to the database
        $query = "UPDATE albums SET name = '$name', artist = '$artist', genre = '$genre', year = '$year', tracks = '$tracks' WHERE id = $id";
        $result = mysqli_query($db, $query)
        or die('Error: '.$query .mysqli_error($db));

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    }
}else if (isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $albumId = $_GET['id'];
    $musicAlbums = [];

    //Get the record from the database result
    $query = "SELECT * FROM albums WHERE id = " . mysqli_escape_string($db, $albumId);
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $musicAlbums[] = $row;
        }
    } else {
        // redirect when db returns no result
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php foreach ($musicAlbums as $album) ?>
<h1>Edit "<?= $album['artist'] . ' - ' . $album['name']; ?>"</h1>

<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value="<?= htmlentities($album['artist']); ?>"/>
        <span class="errors"><?= isset($errors['artist']) ? $errors['artist'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="album">Album</label>
        <input id="album" type="text" name="name" value="<?= $album['name']; ?>"/>
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= $album['genre']; ?>"/>
        <span class="errors"><?= isset($errors['genre']) ? $errors['genre'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= $album['year']; ?>"/>
        <span class="errors"><?= isset($errors['year']) ? $errors['year'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= $album['tracks']; ?>"/>
        <span class="errors"><?= isset($errors['tracks']) ? $errors['tracks'] : '' ?></span>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $albumId; ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<?php ?>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
