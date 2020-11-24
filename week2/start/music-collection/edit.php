<?php
// Include data (all albums)
require_once 'includes/music-data.php';

// IF index is not present in url or value is empty
if (!isset($_GET['index']) || isset($_GET['index']) == ''){
    // redirect to index.php
    header('Location: index.php');
}


// IF index is present

    // Get index of album from url (GET)
$index = $_GET['index'];
    // get album from albums collection
$musicAlbum = $musicAlbums[$index];

if (isset($_POST['submit'])){
    $musicAlbum['artist'] = $_POST['artist'];
    $musicAlbum['album'] = $_POST['album'];
    $musicAlbum['genre'] = $_POST['genre'];
    $musicAlbum['year'] = $_POST['year'];
    $musicAlbum['tracks'] = $_POST['tracks'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Collection - Edit [ALBUM]</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<section>
    <h1>Edit album - specifiek album</h1>

    <form action="" method="post">
        <div class="data-field">
            <label for="artist">Artist</label>
            <input id="artist" type="text" name="artist" value="<?= $musicAlbum['artist'] ?>"/>
        </div>
        <div class="data-field">
            <label for="album">Album</label>
            <input id="album" type="text" name="album" value="<?= $musicAlbum['album'] ?>"/>
        </div>
        <div class="data-field">
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre" value="<?= $musicAlbum['genre'] ?>"/>
        </div>
        <div class="data-field">
            <label for="year">Year</label>
            <input id="year" type="text" name="year" value="<?= $musicAlbum['year'] ?>"/>
        </div>
        <div class="data-field">
            <label for="tracks">Tracks</label>
            <input id="tracks" type="number" name="tracks" value="<?= $musicAlbum['tracks'] ?>"/>
        </div>
        <div class="data-submit">
            <input type="hidden" name="album-number" value="<?= $_GET['index'] ?>"/>
            <input type="submit" name="submit" value="Save"/>
        </div>
    </form>
</section>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
