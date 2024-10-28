<?php
session_start();
require_once './app/AuthController.php';

$authController = new AuthController();
$products = $authController->getProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            margin-top: 20px;
        }

        .products {
            display: flex;
            margin-top: 50px;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .card {
            width: 300px;
            height: 400px;
        }

        .card img {
            width: 175px;
            height: 200px;
            margin: auto;
            margin-top: 20px;
        }

        .card-body {
            height: 40%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-body .btns {
            bottom: 0;
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
            <h1>Available Products</h1>

            <div class="row">
                <?php foreach ($products as $product): ?>
                    <?php
                    $available_presentations = array_filter($product['presentations'], function ($presentation) {
                        return $presentation['status'] === 'activo' && $presentation['stock'] > 0;
                    });

                    if (count($available_presentations) > 0):
                    ?>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="<?= htmlspecialchars($product['cover']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>

                                    <?php if (!empty($available_presentations)): ?>
                                        <?php
                                        ?>
                                        <p><strong>Precio:</strong> $<?= number_format($available_presentations[0]['price'][0]['amount'], 2) ?></p>
                                    <?php else: ?>
                                        <p>No hay precios disponibles para este producto.</p>
                                    <?php endif; ?>

                                    <div class="btns">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            onclick="window.location.href='./product.php?id=<?= htmlspecialchars($product['id']) ?>'">
                                            Details
                                        </button>

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>