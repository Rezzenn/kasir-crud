<?php 
    include 'config/database.php';

    if(!isset($_SESSION['is_login'])) {
        header("Location: login.php");
    }

    echo $_SESSION['name'];

    if(isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header('location: index.php');
        }

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    if(isset($_POST['enter'])){
        $barcode = $_POST['barcode'];
        $sql = "SELECT id, name, price, stock WHERE barcode = '$barcode'";
        $res = $db->query($sql);

        if(mysqli_num_rows($res) > 0){
            $product = $res->fetch_assoc();
            $id = $product['id'];

            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$id] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'qty' => 1
                ];
            }
        } else {
        echo "produk tidak ditemukan";
        } 
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
    <style>
        th, td{
            border: 1 solid black;
        }
    </style>

    <a href="products.php">produk</a>

    <form action="index.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form><br><br>

    <div>
        <form action="index.php" method="post">
            <input type="number" name="barcode" id="barcode" autofocus autocomplete="off" placeholder="Enter Barcode here...">
            <input type="button" value="Enter" name="enter">
        </form>
        <table border="1" cellpadding="10" width="100%">
            <thead>
                <th>Barcode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <td>1203023847</td>
                <td>indomi</td>
                <td>3400</td>
                <td>10</td>
                <td>34000</td>
            </tbody>
        </table>
    </div>
</body>
</html>

//Testing Saja hehehe