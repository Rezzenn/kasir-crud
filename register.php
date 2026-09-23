<?php
include 'config/database.php';

    if(isset($_SESSION['is_login'])){
        header('location: index.php');
    }


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];
    $password = $_POST['password'];

    if($password != $confirm_password) {
        echo "pasword beda kontoll";
    } else {
        $hash_password = hash('sha256', $password);
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hash_password')";

        try{
            if($db->query($sql) === TRUE) {
                echo "sukses";
                header('location: index.php');
            } else {
                echo "gagal";
            }
        } catch(mysqli_sql_exception) {
            echo "gak boleh sama anunya";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Register</title>
</head>
<body>
    <div>
        <form action="register.php" method="post">
            <label for="name">name</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">email</label>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">password</label>
            <input type="password" id="password" name="password"><br><br>
            <label for="confirm_password">konfirmaasi password</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <input type="submit" value="login" name="submit">
        </form>
        <a href="login.php">login</a>
    </div>
</body>
</html>