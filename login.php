<?php
include 'config/database.php';


if(isset($_POST['submit'])){
    echo 'dend';
    echo $_POST['username'];
    echo $_POST['password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Login</title>
</head>
<body>
    <div>
        <form action="login.php" method="post">
            <label for="username">username</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="login" name="submit">
        </form>
    </div>
</body>
</html>