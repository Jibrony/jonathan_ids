<?php
session_start();
require_once './app/AuthController.php';

$authController = new AuthController();
$productSlug = isset($_GET['slug']) ? $_GET['slug'] : null;

if ($productSlug === null) {
    echo "Producto no encontrado.";
    exit;
}

$product = $authController->getProductBySlug($productSlug);

if ($product === null) {
    echo "Producto no encontrado.";
    exit;
}

// Información del producto, manejando datos nulos
$productName = isset($product['name']) ? htmlspecialchars($product['name']) : "Nombre no disponible";
$productCover = isset($product['cover']) ? htmlspecialchars($product['cover']) : "";
$productDescription = isset($product['description']) ? htmlspecialchars($product['description']) : "Descripción no disponible";
$productBrand = isset($product['brand']['name']) ? htmlspecialchars($product['brand']['name']) : "Marca no disponible";
$productCategories = isset($product['categories']) ? array_map(function ($category) {
    return htmlspecialchars($category['name']);
}, $product['categories']) : ["Categoría no disponible"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        #sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .flex-grow-1 {
            margin-left: 250px;
            /* Adjust to sidebar width */
            padding: 20px;
        }

        .navbar {
            width: 83%;
            position: fixed;
            margin-left: -20px;
            top: 0;
            z-index: 1000;

        }

        .main-content {
            margin-top: 70px;
        }

        .row {
            display: flex;
            flex-direction: row;
            margin-top: 50px;
            gap: 20px;
            /* Espaciado entre columnas */
        }

        #carouselExampleIndicators {
            width: 100%;
            height: 250px;
        }

        #carouselExampleIndicators img {
            width: 100%;
            height: 300px;
        }

        .card {
            width: 100%;
            height: auto !important;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            /* Asegura que el contenido esté en columna */
        }


        /* Responsividad */
        @media (max-width: 992px) {
            #sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .flex-grow-1 {
                margin-left: 0;
            }

            .navbar {
                width: 100%;
            }

            .main-content {
                margin-top: 120px;
            }
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            .navbar {
                width: 100%;
            }

            .main-content {
                margin-top: 70px;
            }

            .products {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

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
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar scroll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="main-content">
            <div class="card">
                <div class="row">
                    <!-- Carrusel en la columna izquierda -->
                    <div class="col-md-4">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?= htmlspecialchars($product['name']) ?>"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="<?= htmlspecialchars($product['name']) ?>"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="<?= htmlspecialchars($product['name']) ?>"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= htmlspecialchars($product['cover']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="d-block w-100"
                                        onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product['name']); ?>';">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= htmlspecialchars($product['cover']) ?>" alt="Slide 1" class="d-block w-100"
                                    onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product['name']); ?>';">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= htmlspecialchars($product['cover']) ?>" alt="Slide 2" class="d-block w-100"
                                    onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product['name']); ?>';">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>

                    <!-- Información del producto en la columna derecha -->
                    <div class="col-md-6">
                        <div class="card-header">
                            <h1><?= htmlspecialchars($product['name']) ?></h1>
                        </div>
                        <div class="card-body">
                            <p><strong>Descripción:</strong> <?= htmlspecialchars($product['description']) ?></p>
                            <p><strong>Marca:</strong> <?= htmlspecialchars($product['brand']['name']) ?></p>
                            <div class="btns">
                                <?php
                                $buttonColors = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-dark'];
                                ?>

                                <p><strong>Categorías:</strong></p>

                                <?php if (!empty($product['brand']['name'])): ?>
                                    <button class="btn <?= $buttonColors[array_rand($buttonColors)] ?> mb-2">
                                        <?= htmlspecialchars($product['brand']['name']) ?>
                                    </button>
                                <?php endif; ?>

                                <?php if (!empty($product['tags'])): ?>
                                    <?php foreach ($product['tags'] as $tag): ?>
                                        <button class="btn <?= $buttonColors[array_rand($buttonColors)] ?> mb-2">
                                            <?= htmlspecialchars($tag['name']) ?>
                                        </button>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <button class="btn btn-secondary mb-2">Etiquetas: No disponible</button>
                                <?php endif; ?>
                            </div>

                            <a href="home.php" class="btn btn-primary">Volver a la lista de productos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>