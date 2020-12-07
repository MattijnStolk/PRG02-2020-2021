<?php
//Require music data to use the db variable in this file
require_once 'includes/database.php';

//Get the result set from the database with a SQL query
$query = "SELECT * FROM albums";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

//Loop through the result to create a custom array
$albums = [];

while($row = mysqli_fetch_assoc($result))
{
    $albums[] = $row;
}

//Close connection
mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Music Collection</h1>
<a href="index-alternative.php">Check alternative view</a>
<table>
    <thead>
    <tr>
        <th></th>
        <th>#</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Tracks</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="9">&copy; My Collection</td>
    </tr>
    </tfoot>ame
    <tbody>

    <?php foreach ($albums as $album) { ?>
        <tr>
            <td class="image"><img src="<?=$album['img']?>" alt=""/></td>
            <td><?=$album['id']?></td>
            <td><?=$album['artist']?></td>
            <td><?=$album['n']?></td>
            <td><?=$album['genre']?></td>
            <td><?=$album['year']?></td>
            <td><?=$album['tracks']?></td>
            <td><a href="detail.php?index=<?=$album['id']?>">Details</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
