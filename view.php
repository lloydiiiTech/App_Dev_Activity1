<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $databasename = "clanor_product";
    
    $connect = mysqli_connect($host, $username, $password, $databasename);
    if (!$connect) {
        die("Connection Failed: " . mysqli_connect_error());
    }
    
    $sql= "SELECT `ID`, `Name`, `Description`, `Price`, `Quantity` FROM `product`";
    $result = mysqli_query($connect, $sql);

    if(isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $sql = "DELETE FROM `product` WHERE `ID` = '$id'";
    
        if(mysqli_query($connect, $sql)){
            echo "Deleted";
            echo "<script>window.location.href = 'view.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <h3>Product List</h3>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Descriptio</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </thead>  
        <tbody>
            <?php
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?=$row['ID']?></td>
                            <td><?=$row['Name']?></td>
                            <td><?=$row['Description']?></td>
                            <td><?=$row['Price']?></td>
                            <td><?=$row['Quantity']?></td>
                            <td class="text-center">
                                <a href="update.php?id=<?= $row['ID'] ?>">Edit</a>
                                <a href="view.php?delete_id=<?= $row['ID'] ?>">Delete</a>
                            </td>

                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>  
    
    </table>


    <a href="add.php">Add Product</a>
</body>
</html>