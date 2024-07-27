<?php include 'Database.php'?>
<?php
// Retrieve form data
$productName = $_POST['productName'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$rate = $_POST['rate'];
$price = $quantity * $rate;

// Insert data into the table
$sql = "INSERT INTO addproduct (ProductName, Category, Quantity, Rate, Total)
        VALUES ('$productName', '$category', $quantity, $rate, $price)";

if ($conn->query($sql) === TRUE) {
    echo "<br>Product added successfully.";
} else {
    echo "Error: " . $conn->error;
}

//insert into purchase table
$sql1 = "INSERT INTO purchase (ProductName, Category, Quantity, Rate, Total)
        VALUES ('$productName', '$category', $quantity, $rate, $price)";

if ($conn->query($sql1) === TRUE) {
    echo "<br>Product added to purchase table aslo!!!";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>