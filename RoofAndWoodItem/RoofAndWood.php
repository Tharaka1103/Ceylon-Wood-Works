
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Wood Works - Quality Furniture</title>
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
                        <a class="nav-link active" href="http://localhost/Furniture/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="RoofAndWood.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<main class="container my-5">
        <h1 class="text-center mb-5">Our Products</h1>
        <!-- Wood Items Section -->
        <div class="row">
            <div class="col-md-6">
                <section class="mb-5">
                    <h2 class="text-center mb-4">Window Items</h2>
                    <div class="row row-cols-1 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm w-100">
                                <img src="wood.jpg" class="card-img-top" alt="Wooden Table">
                                <div class="card-body">
                                    <h5 class="card-title">Window Items</h5>
                                    <p class="card-text">Handcrafted wooden table made from premium teak wood.</p>
                                    <a href="WoodItems.php" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section>
                    <h2 class="text-center mb-4">Roof Items</h2>
                    <div class="row row-cols-1 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm w-100">
                            <img src="roof.jpg" class="card-img-top" alt="Wooden Table">
                            <div class="card-body">
                                    <h5 class="card-title">Roof Tiles</h5>
                                    <p class="card-text">High-quality ceramic roof tiles for durability and style.</p>
                                    <a href="RoofItems.php" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

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


