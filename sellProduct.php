<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'Database.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $productName = $_POST['productName'];
    $quantityToSell = $_POST['quantity'];

    // Fetch the rate of the selected product from the database
    $sql = "SELECT Rate, Quantity FROM addproduct WHERE ProductName = '$productName'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Database query error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rate = $row['Rate'];
        $availableQuantity = $row['Quantity'];

        if ($availableQuantity >= $quantityToSell) {
            $total = $quantityToSell * $rate;

            // Insert data into the 'sales' table
            $insertSql = "INSERT INTO sales (ProductName, Quantity, Total)
                    VALUES ('$productName', $quantityToSell, $total)";

            if ($conn->query($insertSql) === TRUE) {
                // Update the quantity in the 'addproduct' table
                $newQuantity = $availableQuantity - $quantityToSell;
                $updateSql = "UPDATE addproduct SET Quantity = $newQuantity WHERE ProductName = '$productName'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "Product sold successfully. Total: Rs." . number_format($total, 2);
                } else {
                    echo "Error updating product quantity: " . $conn->error;
                }
            } else {
                echo "Error inserting into 'sales' table: " . $conn->error;
            }
        } else {
            echo "Insufficient quantity available to sell.";
        }
    } else {
        echo "Product not found in the database or no quantity available.";
    }

    // Close the database connection
    $conn->close();
}
?>
