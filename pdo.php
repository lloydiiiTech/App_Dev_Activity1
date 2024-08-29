<?php
//connections credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clanor_product";
$dsn = "mysql:host=$servername;dbname=$dbname";

//optional set of attributes to set
$options = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    );
//connection string (ito na yung tatawagin natin kapag mageexecute na ng query)
$pdo = new PDO($dsn, $username, $password, $options);

if (!$pdo) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>