<?php
include 'Database.php'; // Include the database connection file

$sql = "SELECT ProductName FROM addproduct";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'Product Name: ' . $row['ProductName'] . '<br>';
    }
} else {
    echo 'No products found in the database.';
}

// Close the database connection
$conn->close();
?>