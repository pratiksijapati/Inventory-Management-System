<?php
// Include the database connection file
include 'Database.php';

// Retrieve form data
$productName = $_POST['productName'];
$quantityToReturn = $_POST['quantity'];

// Check if the product exists in the addproduct table
$sqlCheckProduct = "SELECT Quantity FROM addproduct WHERE ProductName = '$productName'";
$resultCheckProduct = $conn->query($sqlCheckProduct);

if ($resultCheckProduct->num_rows > 0) {
    $row = $resultCheckProduct->fetch_assoc();
    $currentQuantity = $row['Quantity'];

    // Calculate the new quantity after return
    $newQuantity = $currentQuantity + $quantityToReturn;

    // Update the addproduct table with the new quantity
    $sqlUpdateQuantity = "UPDATE addproduct SET Quantity = $newQuantity WHERE ProductName = '$productName'";
    if ($conn->query($sqlUpdateQuantity) === TRUE) {
        echo "Product returned successfully. New quantity: " . $newQuantity;
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
} else {
    echo "Product not found in the database.";
}

// Close the database connection
$conn->close();
?>