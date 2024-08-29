<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "clanor_product";

$connect = mysqli_connect($host, $username, $password, $databasename);

if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $descrip = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $sql = "UPDATE `product` SET `Name`='$name', `Description`='$descrip', `Price`='$price', `Quantity`='$quantity' WHERE `ID` = '$id'";

    if(mysqli_query($connect, $sql)){
        echo "<script>
        alert('Record Updated!');
         location.href='view.php';
    </script>";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT `Name`, `Description`, `Price`, `Quantity` FROM `product` WHERE `ID` = '$id'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        $name = $row['Name'];
        $descrip = $row['Description'];
        $price = $row['Price'];
        $quantity = $row['Quantity'];
    }
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
<h3>Update Product</h3>
    <form method="post" action="">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?= $name ?>" required>
            <input type="hidden" name="id" value="<?= $id ?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="<?= $descrip ?>" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" value="<?= $price ?>" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="quantity" value="<?= $quantity ?>" required>
        </div>
        <div>
            <button name="submit" type="submit">Update</button>
        </div>
        <a href="view.php">Cancel</a>
    </form>
</body>
</html>
