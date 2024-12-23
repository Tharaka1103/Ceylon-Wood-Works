  <?php
  require_once 'Config.php';
  session_start();

  // Check if user is logged in
  if (!isset($_SESSION['user_id'])) {
      header("Location: ../login.php");
      exit();
  }

  // Fetch roof items from the database
  $stmt = $pdo->query("SELECT * FROM roof_items");
  $roofItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Start a transaction
      $pdo->beginTransaction();

      try {
          // Insert into roof_orders table
          $stmt = $pdo->prepare("INSERT INTO roof_orders (wood_type, customer_name, email, contact_number, address, total_price, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
          $stmt->execute([
              $_POST['woodType'],
              $_POST['name'],
              $_POST['email'],
              $_POST['contactNumber'],
              $_POST['address'],
              $_POST['totalPrice'],
              $_SESSION['user_id']
          ]);

          $orderId = $pdo->lastInsertId();

          // Insert into roof_order_items table
          $stmt = $pdo->prepare("INSERT INTO roof_order_items (order_id, measurement, quantity, price) VALUES (?, ?, ?, ?)");
          foreach ($_POST['quantity'] as $itemId => $quantity) {
              if ($quantity > 0) {
                  $roofItem = $roofItems[array_search($itemId, array_column($roofItems, 'id'))];
                  $stmt->execute([
                      $orderId,
                      $roofItem['measurement'],
                      $quantity,
                      $roofItem['price']
                  ]);
              }
          }

          // Insert into customer_referrals table
          if (!empty($_POST['referredBy'])) {
              $stmt = $pdo->prepare("INSERT INTO customer_referrals (order_id, referred_by) VALUES (?, ?)");
              $stmt->execute([$orderId, $_POST['referredBy']]);
          }

          // Commit the transaction
          $pdo->commit();

          header("Location: success.php");
          exit;
      } catch (Exception $e) {
          // Rollback the transaction if an error occurred
          $pdo->rollBack();
          $error = "An error occurred: " . $e->getMessage();
      }
  }

  // Fetch users for referral dropdown
  $stmt = $pdo->query("SELECT id, username FROM users");
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ceylon Wood Works - Roof Items</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
              box-shadow: 0 2px 4px rgba(0,0,0,.1);
          }
          .navbar-brand, .nav-link {
              color: var(--light-bg) !important;
              transition: color 0.3s ease;
          }
          .navbar-brand:hover, .nav-link:hover {
              color: var(--accent-color) !important;
          }
          .btn-primary {
              background-color: var(--primary-color);
              border-color: var(--primary-color);
              transition: all 0.3s ease;
          }
          .btn-primary:hover {
              background-color: var(--secondary-color);
              border-color: var(--secondary-color);
              color: var(--primary-color);
          }
          .card {
              border-color: var(--secondary-color);
              transition: transform 0.3s ease, box-shadow 0.3s ease;
          }
          .card:hover {
              transform: translateY(-5px);
              box-shadow: 0 4px 8px rgba(0,0,0,.1);
          }
          .card-header {
              background-color: var(--secondary-color);
              color: var(--primary-color);
          }
          .footer {
              background-color: var(--primary-color);
              color: var(--light-bg);
          }
          .item-quantity {
              max-width: 80px;
          }
          #orderSummary {
              max-height: 200px;
              overflow-y: auto;
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

      <div class="container my-5">
          <h2 class="text-center mb-4">Roof Items Order Form</h2>
          <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?= $error ?></div>
          <?php endif; ?>
          <form method="POST" action="">
              <div class="row">
                  <div class="col-md-6">
                      <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="mb-0">Customer Information</h5>
                          </div>
                          <div class="card-body">
                              <div class="mb-3">
                                  <label for="woodType" class="form-label">Wood Type</label>
                                  <input class="form-control" id="woodType" name="woodType" type="text" required>
                              </div>
                              <div class="mb-3">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" required>
                              </div>
                              <div class="mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" required>
                              </div>
                              <div class="mb-3">
                                  <label for="contactNumber" class="form-label">Contact Number</label>
                                  <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                              </div>
                              <div class="mb-3">
                                  <label for="address" class="form-label">Address</label>
                                  <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                              </div>
                              <div class="mb-3">
                                  <label for="referredBy" class="form-label">Referred By</label>
                                  <select class="form-select" id="referredBy" name="referredBy">
                                      <option value="">Select a user</option>
                                      <?php foreach ($users as $user): ?>
                                          <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card mb-4">
                          <div class="card-header">
                              <h5 class="mb-0">Roof Items</h5>
                          </div>
                          <div class="card-body">
                              <?php foreach ($roofItems as $item): ?>
                                  <div class="card mb-3">
                                      <div class="card-body">
                                          <h5 class="card-title"><?= htmlspecialchars($item['measurement']) ?></h5>
                                          <p class="card-text">Price: $<?= number_format($item['price'], 2) ?></p>
                                          <div class="input-group">
                                              <span class="input-group-text">Quantity</span>
                                              <input type="number" class="form-control item-quantity" name="quantity[<?= $item['id'] ?>]" value="0" min="0" data-price="<?= $item['price'] ?>">
                                          </div>
                                      </div>
                                  </div>
                              <?php endforeach; ?>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header">
                              <h5 class="mb-0">Order Summary</h5>
                          </div>
                          <div class="card-body">
                              <div id="orderSummary"></div>
                              <hr>
                              <div class="d-flex justify-content-between">
                                  <strong>Total:</strong>
                                  <strong id="totalPrice">$0</strong>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="0">
              <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
              </div>
          </form>
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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              const quantityInputs = document.querySelectorAll('.item-quantity');
              const orderSummary = document.getElementById('orderSummary');
              const totalPriceElement = document.getElementById('totalPrice');
              const hiddenTotalPrice = document.getElementById('hiddenTotalPrice');

              function updateOrderSummary() {
                  let total = 0;
                  orderSummary.innerHTML = '';

                  quantityInputs.forEach(input => {
                      const quantity = parseInt(input.value);
                      const price = parseFloat(input.dataset.price);
                      const itemTotal = quantity * price;

                      if (quantity > 0) {
                          total += itemTotal;
                          const itemName = input.closest('.card-body').querySelector('.card-title').textContent;
                          orderSummary.innerHTML += `<p>${itemName} x ${quantity}: ${itemTotal.toFixed(2)}</p>`;
                      }
                  });

                  totalPriceElement.textContent = `${total.toFixed(2)}`;
                  hiddenTotalPrice.value = total.toFixed(2);
              }

              quantityInputs.forEach(input => {
                  input.addEventListener('change', updateOrderSummary);
              });

              // Add animation to cards
              const cards = document.querySelectorAll('.card');
              cards.forEach(card => {
                  card.addEventListener('mouseenter', () => {
                      card.style.transform = 'translateY(-5px)';
                      card.style.boxShadow = '0 4px 8px rgba(0,0,0,.1)';
                  });
                  card.addEventListener('mouseleave', () => {
                      card.style.transform = 'translateY(0)';
                      card.style.boxShadow = 'none';
                  });
              });
          });
      </script>
  </body>
  </html>