<?php
require_once 'Config.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data with input validation
    $treeName = isset($_POST['treeName']) ? trim($_POST['treeName']) : '';
    $expectedPrice = isset($_POST['expectedPrice']) ? floatval($_POST['expectedPrice']) : 0;
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $ownerName = isset($_POST['ownerName']) ? trim($_POST['ownerName']) : '';
    $contactNumber = isset($_POST['contactNumber']) ? trim($_POST['contactNumber']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Validate required fields
    if (empty($treeName) || empty($address) || empty($ownerName) || empty($contactNumber) || empty($email)) {
        echo "Error: All fields are required.";
        exit;
    }

    // Prepare the SQL query
    $sql = "INSERT INTO tree_sales (tree_name, expected_price, address, owner_name, contact_number, email)
            VALUES (?, ?, ?, ?, ?, ?)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("sdssss", $treeName, $expectedPrice, $address, $ownerName, $contactNumber, $email);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            header("Location: success.php");
            exit;
        } else {
            // Handle the error
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Handle the exception
        echo "Error: " . $e->getMessage();
    }
}
?>
