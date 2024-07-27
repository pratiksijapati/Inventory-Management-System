<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Return</title>
    <link rel="stylesheet" href="salesReturn.css"> <!-- You can create a separate CSS file for styling -->
</head>
<body>
    <header>
        <h1>Sales Return</h1>
    </header>
    <main>
        <form action="sales_Return.php" method="POST">
            <label for="productName">Product Name:</label>
            <select id="productName" name="productName" required>
                <option value="" disabled selected>Select a product</option>
                <!-- PHP code to fetch product names from the database -->
                <?php
                    include 'Database.php';
                    $sql = "SELECT ProductName FROM addproduct";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ProductName'] . '">' . $row['ProductName'] . '</option>';
                        }
                    }
                ?>
            </select>
            <br>
            <label for="quantity">Quantity to Return:</label>
            <input type="number" id="quantity" name="quantity" required>
            <br>
            <input type="submit" value="Return Product">
            <label for="home">
                <a href="Home.html">Back to Home</a>
            </label>
        </form>
    </main>
    <footer>
        <p>&copy; Your Retail Store</p>
    </footer>
</body>
</html>