<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
    <link rel="stylesheet" href="sellProduct.css">
</head>

<body>
    <header>
        <h1>Sell Product</h1>
    </header>
    <main>
        <form action="sellProduct.php" method="POST">
            <label for="productName">Product Name:</label>
            <select id="productName" name="productName" required>
                <option value="" disabled selected>Select a product</option>
                <!-- PHP code to fetch product names from the database -->
                <?php
                    include 'Database.php';
                    $sql = "SELECT ProductName FROM addproduct WHERE Quantity > 0"; // Only show products with available quantity
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ProductName'] . '">' . $row['ProductName'] . '</option>';
                        }
                    }
                ?>
            </select>
            <br>
            <label for="quantity">Quantity to Sell:</label>
            <input type="number" id="quantity" name="quantity" required>
            <br>
            <input type="submit" value="Sell Product">
            <label for="home">
                <a href="Home.html">Back to Home</a>
            </label>
        </form>
        <!-- Feedback message container -->
        <div id="feedback-container">
            <?php
                // PHP code to display feedback message after the sale
                if (isset($_POST['productName'])) {
                    if (isset($total)) {
                        echo 'Product sold successfully. Total: $' . number_format($total, 2);
                    } else {
                        echo 'Sale failed. Please check the product and quantity.';
                    }
                }
            ?>
        </div>
    </main>
    <footer>
        <h2>&copy; P&R Retail Store</h2>
    </footer>
</body>

</html>