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
    <link rel="stylesheet" type="text/css" href="css/alternative.css"/>
</head>
<body>
    <main>
        <h1>Music collection full of awesomeness!</h1>

        <nav>
            <a href="index.php">Check default view</a>
        </nav>

        <div class="albums">
            <?php foreach ($albums as $album) { ?>
                <album>
                    <div class="cover">
                        <a href="detail.php?index=<?=$album['id']?>">
                            <img src="<?=$album['img']?>" alt=""/>
                        </a>
                    </div>
                    <div class="links">
                        <a class="detail" href="detail.php?index=<?=$album['id']?>"><?=$album['artist']?></a>
                    </div>
                </album>
            <?php } ?>
        </div>
    </main>
</body>
</html>
