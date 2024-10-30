<?php
session_start();
include_once './app/ProductsController.php';

$productController = new ProductsController();
$products = $productController->getProducts();

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

        .card-img-top {
            width: 250px;
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
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Add</a>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($product['cover']) ?>" class="card-img-top"
                                alt="<?php echo htmlspecialchars($product['name']) ?>"
                                onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($product['name']); ?>';">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']) ?></h5>

                                <?php if (!empty($product['presentations'])): ?>
                                    <p><strong>Precio:</strong> $<?= number_format($product['presentations'][0]['price'][0]['amount'], 2) ?></p>
                                <?php else: ?>
                                    <p>No hay precios disponibles para este producto.</p>
                                <?php endif; ?>

                                <div class="btns">
                                    <a href="./details.php?slug=<?php echo htmlspecialchars($product['slug']); ?>" class="btn btn-primary">Details</a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo htmlspecialchars($product['id']); ?>">
                                        Edit
                                    </button>
                                    <form action="./app/ProductsController.php" id='delete-form-<?php echo htmlspecialchars($product['id']) ?>' method="POST">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                        <input type="hidden" name="action" value="deleteProduct">
                                    </form>
                                    <button type="button" class="btn btn-danger target" value="<?php echo htmlspecialchars($product['id']); ?>">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- El modal va dentro del foreach, ya que, cada producto tiene su propio boton por asi decirlo de editar, por ende
                     obtenemos el id facilmenta, ya que sin el id, no se puede modificar -->
                    <div class="modal fade" id="modalEdit<?php echo htmlspecialchars($product['id']); ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="modalFormEdit" method="POST" action="./app/ProductsController.php?id=<?php echo htmlspecialchars($product['id']); ?>">
                                        <div class="mb-3">
                                            <label for="editName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editName" name="name" value="<?php echo ($product['name']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editSlug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="editSlug" name="slug" value="<?php echo ($product['slug']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editDescription" class="form-label">Description</label>
                                            <input class="form-control" id="editDescription" name="description" value="<?php echo ($product['description']); ?>" rows="3" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editFeatures" class="form-label">Features</label>
                                            <input class="form-control" id="editFeatures" name="features" value="<?php echo ($product['features']); ?>" rows="3" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <input type="hidden" name="action" value="editProduct">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalAddLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormAdd" method="POST" action="./app/AddProductController.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="features" class="form-label">Features</label>
                                <textarea class="form-control" id="features" name="features" rows="3" required></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input class="form-control" id="brand" name="brand" rows="3" required>
                            </div> -->

                            <input type="hidden" name="action" value="addProduct">
                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
            target = document.querySelectorAll('.target');
            target.forEach(target => {
                target.addEventListener('click', function() {
                    console.log(target.value);
                    swal({
                            title: "Estas seguro?",
                            text: "¡Una vez eliminado, no podrás recuperar este archivo imaginario!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                document.getElementById(`delete-form-${target.value}`).submit()
                                swal("Poof! ¡Tu archivo imaginario ha sido eliminado!", {
                                    icon: "success",
                                    
                                });
                            }
                        });
                })
            })
        });
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>