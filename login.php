<?php
include 'config/database.php';


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $res = $db->query($q);

    if(mysqli_num_rows($res) > 0){
        $data = $res->fetch_assoc();
        $_SESSION['name'] = $data['name'];
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['is_login'] = true;
        header('location: index.php');

    } else {
        echo "email atau password salah!!!!";
    }
}

    echo $_SESSION['name'];

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
            <label for="email">email</label>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="login" name="submit">
        </form>
    </div>
</body>
</html>