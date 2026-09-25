<?php

include 'config/database.php';

if(!isset($_SESSION['is_login'])) {
    header("Location: login.php");
}

echo $_SESSION['name'];

if(isset($_POST['submit'])) {
    $barcode = $_POST["barcode"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO products (barcode, name, price, stock, user_id) VALUES ('$barcode', '$name', '$price', '$stock', '$user_id')";

    try{
        if($db->query($sql) === TRUE) {
            echo "sukses menambahkan produk";
            unset($_POST);
        }
    } catch(mysqli_sql_exception) {
        echo "barcode tidak bisa sama";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crasir - Produk</title>

    <style>
        td {
            border: black 1px solid;
        }
    </style>
</head>
<body>
    <a href="index.php">back</a>
    <form action="products.php" method="post">
        <label for="barcode">barcode</label>
        <input type="number" name="barcode" id="barcode"><br>
        <label for="name">nama</label>
        <input type="text" name="name" id="name"><br>
        <label for="price">harga</label>
        <input type="number" name="price" id="price"><br>
        <label for="stock">stok</label>
        <input type="number" name="stock" id="stock"><br>
        <input type="submit" value="submit" name="submit">
    </form>

    <table>
        <tr>
            <td>id</td><td>barcode</td><td>name</td><td>price</td><td>stock</td><td>user</td><td>created at</td>
        </tr>
        <?php
    
    $sql2 = "SELECT * FROM products ORDER BY name ASC";
    $result = $db->query($sql2);

    if($products = mysqli_num_rows($result) > 0){
        while($products = $result->fetch_assoc()) {

            $product_id = $products['id'];
            $product_barcode = $products['barcode'];
            $product_name = $products['name'];
            $product_price = $products['price'];
            $product_stock = $products['stock'];
            $product_user_id = $products['user_id'];
            $product_created_at = $products['created_at'];
            
            echo "<tr>";
            echo "<td>" . $product_id . "</td><td>" . $product_barcode . "</td><td>" . $product_name . "</td><td>" . $product_price . "</td><td>" . $product_stock . "</td><td>" . $product_user_id . "</td><td>" . $product_created_at . "</td>";
            echo "</tr>";

        }
    }
    
    ?>
    </table>
</body>
</html>