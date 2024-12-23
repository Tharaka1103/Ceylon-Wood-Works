<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Wood Works - Sell Paints</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS styles here -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="RoofAndWoodItem/RoofAndWood.php">Roof and Wood</a></li>
                            <li><a class="dropdown-item" href="Furnitures/Furnitures.php">Furnitures</a></li>
                            <li><a class="dropdown-item" href="RoofAndWoodServices/RoofAndWoodServices.php">Window & Roof Services</a></li>
                            <li><a class="dropdown-item" href="FinishedPlanks/FinishedPlanks.php">Finished Planks</a></li>
                            <li><a class="dropdown-item" href="SellPaints/SellPaints.php">Sell Paints</a></li>
                            <li><a class="dropdown-item" href="#">Other Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Furnitures/Furnitures.php">Furnitures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-5">Sell Paints</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            require_once 'Items.php';

            foreach ($paintDetails as $paint) {
                echo '
                <div class="col">
                    <div class="card h-100">
                        <img src="' . $paint["image"] . '" class="card-img-top" alt="' . $paint["name"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $paint["name"] . '</h5>
                            <p class="card-text">' . $paint["description"] . '</p>
                            <a href="PaintDetails.php?id=' . $paint["id"] . '" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <footer class="footer py-4 mt-5" style="background-color: var(--primary-color); color: var(--light-bg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h5>Ceylon Wood Works</h5>
                    <p>Crafting quality furniture since 1995</p>
                </div>
                <div class="col-lg-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Home</a></li>
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
                    <a href="#" class="text-light"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <small>© 2023 Ceylon Wood Works. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>