<?php
session_start();
require_once 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch recent activities
$activities_sql = "
    (SELECT 'Furniture Order' as type, order_date as date FROM furniture_orders WHERE customer_name = ?)
    UNION
    (SELECT 'Roof Order' as type, created_at as date FROM roof_orders WHERE user_id = ?)
    UNION
    (SELECT 'Wood Item Order' as type, order_date as date FROM wood_item_orders WHERE user_id = ?)
    UNION
    (SELECT 'Plank Purchase' as type, purchase_date as date FROM plank_purchases WHERE customer_name = ?)
    UNION
    (SELECT 'Plank Rental' as type, request_date as date FROM plank_rentals WHERE customer_name = ?)
    ORDER BY date DESC
    LIMIT 5
";
$activities_stmt = $conn->prepare($activities_sql);
$activities_stmt->bind_param("siiss", $user['username'], $user_id, $user_id, $user['username'], $user['username']);
$activities_stmt->execute();
$activities_result = $activities_stmt->get_result();

// Fetch referrals
$referrals_sql = "SELECT * FROM customer_referrals WHERE referred_by = ?";
$referrals_stmt = $conn->prepare($referrals_sql);
$referrals_stmt->bind_param("i", $user_id);
$referrals_stmt->execute();
$referrals_result = $referrals_stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Wood Works - User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2B48C;
            --accent-color: #DEB887;
            --text-color: #4A4A4A;
            --light-bg: #F5F5DC;
        }
        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-color);
            background-color: var(--light-bg);
        }
        .navbar {
            background-color: var(--primary-color);
        }
        .navbar-brand, .nav-link {
            color: var(--light-bg) !important;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: var(--primary-color);
        }
        .footer {
            background-color: var(--primary-color);
            color: var(--light-bg);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ceylon Wood Works</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-5">User Profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Welcome, <?php echo htmlspecialchars($user['username']); ?></h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Recent Activities</h2>
                <ul class="list-group">
                    <?php while ($activity = $activities_result->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <?php echo htmlspecialchars($activity['type']); ?> - 
                            <?php echo date('F j, Y', strtotime($activity['date'])); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Your Referrals</h2>
                <ul class="list-group">
                    <?php while ($referral = $referrals_result->fetch_assoc()): ?>
                        <li class="list-group-item">
                            Order ID: <?php echo htmlspecialchars($referral['order_id']); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h5>Ceylon Wood Works</h5>
                    <p>Crafting quality furniture since 1995</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-light">Home</a></li>
                        <li><a href="products.php" class="text-light">Products</a></li>
                        <li><a href="about.php" class="text-light">About Us</a></li>
                        <li><a href="contact.php" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Connect With Us</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-light"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
