<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Wood Works - Finished Planks</title>
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
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
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
                            <li><a class="dropdown-item" href="FinishedPlank/FinishedPlanks.php">Finished Planks</a></li>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-5">Finished Planks</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="10.jpg" class="card-img-top" alt="Finished Plank 1">
                    <div class="card-body">
                        <h5 class="card-title">Oak Plank</h5>
                        <p class="card-text">High-quality oak plank with a smooth finish, perfect for flooring or furniture making.</p>
                        
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#purchesModal" data-plank-name="Oak Plank">Purches</button>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#rentModal" data-plank-name="Oak Plank">Rent Item</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="10.jpg" class="card-img-top" alt="Finished Plank 1">
                    <div class="card-body">
                        <h5 class="card-title">Oak Plank</h5>
                        <p class="card-text">High-quality oak plank with a smooth finish, perfect for flooring or furniture making.</p>
                        
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#purchesModal" data-plank-name="Oak Plank">Purches</button>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#rentModal" data-plank-name="Oak Plank">Rent Item</button>
                    </div>
                </div>
            </div>
            
            <!-- Repeat for other planks -->
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

    <div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rentModalLabel">Rent Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="rent_confirmation.php" method="POST">
                        <input type="hidden" id="plankName" name="plankName">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Rental Duration (in days)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="purchesModal" tabindex="-1" aria-labelledby="purchesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchesModalLabel">Purchase Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="purchase_confirmation.php" method="POST">
                        <input type="hidden" id="plankName" name="plankName">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Delivery Address</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        var rentModal = document.getElementById('rentModal')
        rentModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var plankName = button.getAttribute('data-plank-name')
            var modalTitle = rentModal.querySelector('.modal-title')
            var plankNameInput = rentModal.querySelector('#plankName')
            
            modalTitle.textContent = 'Rent ' + plankName
            plankNameInput.value = plankName
        })

        var purchesModal = document.getElementById('purchesModal')
        purchesModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var plankName = button.getAttribute('data-plank-name')
            var modalTitle = purchesModal.querySelector('.modal-title')
            var plankNameInput = purchesModal.querySelector('#plankName')
            
            modalTitle.textContent = 'Purchase ' + plankName
            plankNameInput.value = plankName
        })
    </script>
</body>
</html>
