<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="Report.css"> <!-- You can create a separate CSS file for styling -->
</head>
<body>
    <header>
        <h1>Report</h1>
    </header>
    <main>
        <div class="report-container">
            <!-- Left div for Purchase Report -->
            <div class="report-box">
                <h2>Purchase Report</h2>
                <?php
                    // Include the database connection file
                    include 'Database.php';

                    // Retrieve purchase data from the database
                    $sqlPurchase = "SELECT * FROM purchase";
                    $resultPurchase = $conn->query($sqlPurchase);

                    if ($resultPurchase->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Product Name</th><th>Category</th><th>Quantity</th><th>Rate</th><th>Total</th></tr>";
                        while ($row = $resultPurchase->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ProductName"] . "</td>";
                            echo "<td>" . $row["Category"] . "</td>";
                            echo "<td>" . $row["Quantity"] . "</td>";
                            echo "<td>Rs." . $row["Rate"] . "</td>";
                            echo "<td>Rs." . $row["Total"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No purchase data available.</p>";
                    }
                ?>
            </div>

            <!-- Right div for Sales Report -->
            <div class="report-box">
                <h2>Sales Report</h2>
                <?php
                    // Retrieve sales data from the database
                    $sqlSales = "SELECT * FROM sales";
                    $resultSales = $conn->query($sqlSales);

                    if ($resultSales->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Product Name</th><th>Quantity</th><th>Total</th></tr>";
                        while ($row = $resultSales->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ProductName"] . "</td>";
                            echo "<td>" . $row["Quantity"] . "</td>";
                            echo "<td>Rs." . $row["Total"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No sales data available.</p>";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </div>
        </div>
        <label for="home">
            <a href="Home.html">Back to Home</a>
        </label>
    </main>
    <footer>
        <p>&copy; P&R Retail Store</p>
    </footer>
</body>
</html>