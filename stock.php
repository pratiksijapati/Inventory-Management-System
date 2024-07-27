<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="stock.css"> <!-- You can create a separate CSS file for styling -->
</head>

<body>
    <header>
        <h1>Stock</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Rate</th>
            </tr>
            <?php
            // Include the database connection file
            include 'Database.php';

            // Retrieve product data from the database
            $sql = "SELECT ProductName, Category, Quantity, Rate FROM addproduct";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ProductName"] . "</td>";
                    echo "<td>" . $row["Category"] . "</td>";
                    echo "<td>" . $row["Quantity"] . "</td>";
                    echo "<td>$" . $row["Rate"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products in stock.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
        <label for="home">
            <a href="Home.html">Home</a>
        </label>
    </main>
    <footer>
        <h2>&copy; P&R Retail Store</h2>
    </footer>
</body>

</html>