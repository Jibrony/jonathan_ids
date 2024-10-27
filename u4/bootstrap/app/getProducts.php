<?php
session_start();
require_once './app/ProductController.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['token'])) {
    header('Location: index.html');
    exit();
}

$productController = new ProductController();
$products = $productController->getProducts();
?>
