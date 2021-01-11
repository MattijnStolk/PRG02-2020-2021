<?php
//connect to the db
require_once 'includes/userDB.php';

session_start();

$login = false;

if (isset($_SESSION['email'])){
    $login = true;
}
print_r($_SESSION);

if (isset($_POST['submit'])){
    $email      = mysqli_escape_string($db, $_POST['email']);
    $password   = mysqli_escape_string($db, $_POST['password']);

    if ($email == ''){
        $errors['email'] = 'email can not be empty';
    }
    if ($password == ''){
        $errors['password'] = 'password can not be empty';
    }

    if (empty($errors)){

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query)
    or die ('Error: ' . $query );

        if(mysqli_num_rows($result) == 1)
        {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $login = true;
                $_SESSION['email'] = $email;
            }
            if (isset($errors['nologin'])){
                unset($errors['nologin']);
            }
        }
        else {
            if ($login == false){
                $errors['wrongPassOrMail'] = 'je moet wel het goede invullen knaap2';
            }
        }

    }
}

if (isset($_POST['logout'])){
    echo 'uitgelogd';
    session_unset();
    session_destroy();
}

echo "<br>";
//close db connection
mysqli_close($db)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<a href="index.php">give up logging in</a>
<h1>Login</h1>

<?php if (isset($errors)) { ?>
    <p><?php foreach ($errors as $error) {
            print $error;
            echo "<br>";
    } ?></p>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
    <div>
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email"/>
        <span></span>
    </div>
    <div>
        <label for="password">Wachtwoord:</label>
        <input id="password" type="password" name="password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login"/>
    </div>
</form>
<?php if ($login == true) { ?>
    <p>je bent ingelogd</p>
    <a href="create.php">go to create</a>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
    <div>
        <input type="submit" name="logout" id="logout" value="logout">
    </div>
</form>

<a href="createUser.php">createUser</a>
</body>
</html>
