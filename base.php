<?php
$servername="localhost";
$username="root";
$password="root";

try{
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password);
    echo "Connect successfully";
}
catch(PDOexception $e){
    echo "Connection failed: " . $e->getMessage();
}
?>