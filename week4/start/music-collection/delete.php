<?php
//Require database in this file
require_once "includes/database.php";

//Get the ID from the URL
$albumId = $_GET['id'];

$query = "DELETE FROM albums WHERE id = '" . mysqli_escape_string($db, $albumId) . "'";
$result = mysqli_query($db, $query);

mysqli_close($db);

header('Location: index.php');
?>
