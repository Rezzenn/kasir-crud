<?php 
include 'config/database.php';
require_once 'includes/function.php';

if(!isset($_SESSION['is_login'])) {
    header("Location: login.php");
}

echo $_SESSION['name'];

echo "<h1>Selamat Datang di Web Kasir!</h1>";
echo "<p>koneksi ke Database PDO berhasil di jalankan</p>";
echo "<p>Test fungsi rupiah: " . rupiah(150000) . "</p>";

if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir</title>
</head>
<body>

    <a href="products.php">produk</a>

    <form action="index.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>

//Testing Saja hehehe