  <!DOCTYPE html>
  <?php
  // Start the session at the very beginning of the file
  session_start();
  ?>
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
              <a class="navbar-brand" href="#">Ceylon Wood Works</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                          <a class="nav-link active" href="index.php">Home</a>
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
                              <li><a class="dropdown-item" href="SellPaints/SellPaints.php">Paints</a></li>
                              <li><a class="dropdown-item" href="BuyingTrees/Trees.php">Sell Trees</a></li>
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
                      <?php
                      // Check if the user is logged in
                      if (isset($_SESSION['user_name'])) {
                          // Display the user's name in the navbar
                          echo '<li class="nav-item dropdown">';
                          echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                          echo $_SESSION['user_name'];
                          echo '</a>';
                          echo '<ul class="dropdown-menu" aria-labelledby="userDropdown">';
                          echo '<li><a class="dropdown-item" href="user_profile.php">User Profile</a></li>';
                          echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                          echo '</ul>';
                          echo '</li>';
                      } else {
                          // Display the Register button
                          echo '<li class="nav-item">';
                          echo '<a class="nav-link" href="Register.php">Register</a>';
                          echo '</li>';
                      }
                      ?>
                  </ul>
              </div>
          </div>
      </nav>
      <header class="py-5 bg-image-full" style="background-image: url('Assets/2.jpg'); background-size: cover; background-position: center;">
          <div class="text-center my-5">
              <h1 class="text-dark fs-1 fw-bolder">Welcome to Ceylon Wood Works</h1>
              <p class="text-dark mb-0">Crafting Excellence in Every Piece</p>
              <a href="RoofAndWoodItem/RoofAndWood.php" class="btn btn-primary mt-3">Explore Our Services</a>
          </div>
      </header>

      <main class="container my-5">
          <section class="row">
              <div class="col-lg-8">
                  <h2 class="mb-4">Our Latest Collections</h2>
                  <div class="row">
                      <div class="col-md-6 mb-4">
                          <div class="card">
                              <img src="https://source.unsplash.com/400x300/?dining-table" class="card-img-top" alt="Dining Table">
                              <div class="card-body">
                                  <h5 class="card-title">Elegant Dining Sets</h5>
                                  <p class="card-text">Discover our range of beautifully crafted dining tables and chairs.</p>
                                  <a href="#" class="btn btn-primary">Shop Now</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4">
                          <div class="card">
                              <img src="https://source.unsplash.com/400x300/?bedroom-furniture" class="card-img-top" alt="Bedroom Furniture">
                              <div class="card-body">
                                  <h5 class="card-title">Cozy Bedroom Furniture</h5>
                                  <p class="card-text">Transform your bedroom with our comfortable and stylish furniture.</p>
                                  <a href="#" class="btn btn-primary">Explore</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="card mb-4">
                      <div class="card-header">
                          <h3 class="card-title">Why Choose Us?</h3>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">High-quality craftsmanship</li>
                          <li class="list-group-item">Sustainable wood sourcing</li>
                          <li class="list-group-item">Custom designs available</li>
                          <li class="list-group-item">Excellent customer service</li>
                      </ul>
                  </div>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Contact Us</h3>
                      </div>
                      <div class="card-body">
                          <p>Have questions? We're here to help!</p>
                          <a href="#" class="btn btn-primary">Get in Touch</a>
                      </div>
                  </div>
              </div>
          </section>
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
