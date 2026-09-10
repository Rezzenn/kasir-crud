<?php 
session_start();
require_once 'includes/function.php';

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}

$url = isset($_GET['url']) ? rtrim(isset($_GET['url']), '/') : 'dashboard';

$url_segments = explode('/', $url);
$modul = $url_segments[0];

// url list herry
switch($modul){
    case 'login':
        include 'modules/auth/login.php';
        break;

    default:
        echo "404 url not find king herry is angry";
        break;
}

echo "<h1>Selamat Datang di Web Kasir!</h1>";
echo "<p>koneksi ke Database PDO berhasil di jalankan</p>";
echo "<p>Test fungsi rupiah: " . rupiah(150000) . "</p>";
?>

//Testing Saja hehehe