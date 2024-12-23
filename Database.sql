CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tree_sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tree_name VARCHAR(255) NOT NULL,
    expected_price DECIMAL(10,2) NOT NULL,
    address TEXT NOT NULL,
    owner_name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `paint_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paint_color` varchar(255) NOT NULL,
  `letters` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `paint_name` varchar(255) NOT NULL,
  `paint_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `service_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paint_object` varchar(255) NOT NULL,
  `object_size` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the wood_orders table
CREATE TABLE wood_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    window_type VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    wood_measurement VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

