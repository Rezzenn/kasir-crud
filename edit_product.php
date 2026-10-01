<?php

    include 'config/database.php';
    require_once 'includes/function.php';

    if(!isset($_SESSION['is_login'])) {
        header("Location: login.php");
    }

    echo $_SESSION['name'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Edit Produk</title>
</head>
<body>
    <a href="index.php">back</a>
</body>
</html>