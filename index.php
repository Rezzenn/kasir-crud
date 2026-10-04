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
        $sql = "SELECT id, name, price, stock FROM products WHERE barcode = '$barcode' LIMIT 1";
        $res = $db->query($sql);

        if(mysqli_num_rows($res) > 0){
            $product = $res->fetch_assoc();
            $id = $product['id'];

            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$id] = [
                    'barcode' => $barcode,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'qty' => 1
                ];
            }
            header("Location: index.php");
            exit;
        } else {
        echo "produk tidak ditemukan";
        } 
    }

    if(isset($_POST['destroy_cart'])){
        unset($_SESSION['cart']);
        header("Location: index.php");
        exit;
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
            <input type="submit" value="enter" name="enter">
        </form>
        <form action="index.php" method="post">
            <input type="submit" value="destroy cart" name="destroy_cart">
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
                <?php
                
                    $total = 0;

                    foreach ($_SESSION['cart'] as $id => $item){
                    $subtotal = $item['price'] * $item["qty"];
                    $total += $subtotal;
                ?>

                <tr>
                    <td><?php echo $item['barcode']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo number_format($subtotal);  ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right"><b>TOTAL BELANJA</b></td>
                    <td colspan="2"><?php echo number_format($total);  ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

//Testing Saja hehehe