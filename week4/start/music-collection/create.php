<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    require_once "includes/database.php";
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $artist = mysqli_escape_string($db, $_POST['artist']);
    $album = mysqli_escape_string($db, $_POST['album']);
    $genre = mysqli_escape_string($db, $_POST['genre']);
    $year = mysqli_escape_string($db, $_POST['year']);
    $tracks = mysqli_escape_string($db, $_POST['tracks']);
    $img = mysqli_escape_string($db, $_POST['img']);

    //Secure the data above

    //Check if data is valid & generate error if not so
    $errors = [];
    if ($artist == "") {
        $errors[] = 'Artist cannot be empty';
    }
    if ($album == "") {
        $errors[] = 'Album cannot be empty';
    }
    if ($genre == "") {
        $errors[] = 'Genre cannot be empty';
    }
    if (!is_numeric($year) || strlen($year) != 4 || $year == "") {
        $errors[] = 'Year needs to be a number with the length of 4';
    }
    if ($tracks == "") {
        $errors[] = 'Tracks cannot be empty';
    }
    if (!is_numeric($tracks)) {
        $errors[] = 'Tracks need to be a number';
    }
    if ($img == "") {
        $errors[] = 'Image cannot be empty';
    }

    //Save the record to the database if errors are empty
    if (empty($errors)){
        $query = "INSERT INTO albums (name, artist, genre, year, tracks, img)
                  VALUES ('$album', '$artist', '$genre', '$year', '$tracks', '$img')";
        $result = mysqli_query($db, $query)
        or die('Error: '.$query);

        if (!$result){
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    };
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Create</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <h1>Create album</h1>
    <?php if (isset($errors)) { ?>
        <ul class="errors">
            <?php foreach ($errors as $error) { ?>
                <li><?= $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
        <div class="data-field">
            <label for="artist">Artist</label>
            <input id="artist" type="text" name="artist" value="<?= (isset($artist) ? htmlentities($artist) : ''); ?>"/>
            <span><?= (isset($errors['artist']) ? $errors['artist'] : '') ?></span>
        </div>
        <div class="data-field">
            <label for="album">Album</label>
            <input id="album" type="text" name="album" value="<?= (isset($album) ? htmlentities($album) : ''); ?>"/>
        </div>
        <div class="data-field">
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre" value="<?= (isset($genre) ? htmlentities($genre) : ''); ?>"/>
        </div>
        <div class="data-field">
            <label for="year">Year</label>
            <input id="year" type="text" name="year" value="<?= (isset($year) ? htmlentities($year) : ''); ?>"/>
        </div>
        <div class="data-field">
            <label for="tracks">Tracks</label>
            <input id="tracks" type="number" name="tracks" value="<?= (isset($tracks) ? htmlentities($tracks) : ''); ?>"/>
        </div>
        <div class="data-field">
            <label for="img">Image</label>
            <input id="img" type="text" name="img" value="<?= (isset($img) ? htmlentities($img) : ''); ?>"/>
        </div>
        <div class="data-submit">
            <input type="submit" name="submit" value="Save"/>
        </div>
    </form>
    <div>
        <a href="index.php">Go back to the list</a>
    </div>
</body>
</html>
