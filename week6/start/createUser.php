<?php
require_once 'includes/userDB.php';



    echo 'verzonden';
    $email = 'harrydewit';
    $password = password_hash('test', PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, password)
                  VALUES ('$email', '$password')";
    $result = mysqli_query($db, $query)
    or die('Error: '.$db -> error);

    if ($result) {
        header('Location: login.php');
        exit;
    } else {
        echo 'er ging iets mis';
    }


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

</body>
</html>
