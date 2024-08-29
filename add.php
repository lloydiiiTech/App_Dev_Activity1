<?php
    include 'pdo.php';



    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $descrip = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        
        $sql = "INSERT INTO `product`(`Name`, `Description`, `Price`, `Quantity`) 
        VALUES (?,?,?,?) ";

        $stmt =$pdo->prepare($sql);
        $stmt->execute(array($name, $descrip, $price, $quantity));
        
        if($stmt->rowCount()>0){
            echo "<script>
            alert('Record Added!');
             location.href='view.php';
        </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h3>Add Product</h3>
    <form method = "post">
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="from-control" name="name" required>
        </div>
        <div class="from-group">
            <label>Description</label>
            <input type="text" class="from-control" name="description" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="from-control" name="price" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="from-control" name="quantity" required>
            
        </div>
        <div>
            <button name="submit" type="submit">Create</button>
            
        </div>
        <a href="view.php">Product List</a>
        
        
    </form>
</body>
</html>