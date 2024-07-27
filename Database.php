<?php
$server = "localhost"; //127.0.0.1
$database = "inventorysystem";
$username="root";
$password ="";

$conn = new mysqli($server,$username,$password,$database);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
else{
    echo "Connction successful";
}