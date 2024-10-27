<?php
require_once './app/AuthController.php';

$authController = new AuthController();
$products = $authController->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content... -->
</head>
<style>
    /* CSS styles... */
</style>
<body>
<div id="sidebar">
        <h4 class="text-center">Sidebar</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Custumers</a>
            </li>
        </ul>
    </div>
    <div class="main-container flex-grow-1">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <!-- Navbar content... -->
        </nav>
        <div class="main-content">
            <h1>Products Content Area</h1>
            <div class="products">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <p class="card-text"><strong>Precio:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No se encontraron productos.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
