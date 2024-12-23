<?php
require_once '../Config.php';

// Fetch all furniture items
$stmt = $conn->prepare("SELECT * FROM furniture");
$stmt->execute();
$result = $stmt->get_result();
$furniture_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Collection - Ceylon Wood Works</title>
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
        .card {
            border-color: var(--secondary-color);
        }
        .card-header {
            background-color: var(--secondary-color);
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
            <a class="navbar-brand" href="http://localhost/Furniture/index.php">Ceylon Wood Works</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Furniture/index.php">Home</a>
                    </li>
                    <!-- Add more navigation items as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Our Furniture Collection</h1>
        <div class="row">
            <?php foreach ($furniture_items as $furniture): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($furniture['image_url']); ?>" alt="<?php echo htmlspecialchars($furniture['name']); ?>" class="card-img-top furniture-image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($furniture['name']); ?></h5>
                            <p class="card-text"><?php echo substr(htmlspecialchars($furniture['description']), 0, 100) . '...'; ?></p>
                            <div class="price h5 text-success mb-2">$<?php echo number_format($furniture['price'], 2); ?></div>
                            <a href="FurnitureDetails.php?id=<?php echo $furniture['id']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="footer mt-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5>Ceylon Wood Works</h5>
                    <p>Quality furniture for your home</p>
                </div>
                <div class="col-lg-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Products</a></li>
                        <li><a href="#" class="text-light">About Us</a></li>
                        <li><a href="#" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Connect With Us</h5>
                    <p>Follow us on social media for updates and inspiration</p>
                    <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>