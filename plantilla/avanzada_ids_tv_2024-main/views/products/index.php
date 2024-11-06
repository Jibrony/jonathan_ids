<?php

include "../../app/config.php";

session_start();
include_once '../../app/ProductsController.php';

$productController = new ProductsController();
$products = $productController->getProducts();

include_once '../../app/BrandController.php';
$brandController = new BrandController();
$brands = $brandController->getAllBrands();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php" ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- [ Pre-loader ] End -->
  <?php include "../layouts/sidebar.php" ?>
  <?php include "../layouts/navbar.php" ?>

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Products</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Products</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="ecom-wrapper">
            <div class="offcanvas-xxl offcanvas-start ecom-offcanvas" tabindex="-1" id="offcanvas_mail_filter">
              <div class="offcanvas-body p-0 sticky-xxl-top">
                <div id="ecom-filter" class="show collapse collapse-horizontal">
                  <div class="ecom-filter">
                    <div class="card">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Filter</h5>
                        <a
                          href="#"
                          class="avtar avtar-s btn-link-danger btn-pc-default"
                          data-bs-dismiss="offcanvas"
                          data-bs-target="#offcanvas_mail_filter">
                          <i class="ti ti-x f-20"></i>
                        </a>
                      </div>
                      <div class="scroll-block">
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0 px-0 py-2">
                              <a class="btn border-0 px-0 text-start w-100 pb-0" data-bs-toggle="collapse" href="#filtercollapse1">
                                <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                Gender
                              </a>
                              <div class="collapse show" id="filtercollapse1">
                                <div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="genderfilter1" value="option1" />
                                    <label class="form-check-label" for="genderfilter1">Male</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="genderfilter2" value="option2" />
                                    <label class="form-check-label" for="genderfilter2">Female</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="genderfilter3" value="option3" />
                                    <label class="form-check-label" for="genderfilter3">Kids</label>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item border-0 px-0 py-2">
                              <a class="btn border-0 px-0 text-start w-100 pb-0" data-bs-toggle="collapse" href="#filtercollapse2">
                                <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                Categories
                              </a>
                              <div class="collapse show" id="filtercollapse2">
                                <div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter1" value="option1" />
                                    <label class="form-check-label" for="categoryfilter1">All</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter2" value="option2" />
                                    <label class="form-check-label" for="categoryfilter2">Electronics</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter3" value="option3" />
                                    <label class="form-check-label" for="categoryfilter3">Fashion</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter4" value="option1" />
                                    <label class="form-check-label" for="categoryfilter4">Kitchen</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter5" value="option2" />
                                    <label class="form-check-label" for="categoryfilter5">Books</label>
                                  </div>
                                  <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" id="categoryfilter6" value="option3" />
                                    <label class="form-check-label" for="categoryfilter6">Toys</label>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item border-0 px-0 py-2">
                              <a class="btn border-0 px-0 text-start w-100 pb-2" data-bs-toggle="collapse" href="#filtercollapse3">
                                <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                Colors
                              </a>
                              <div class="collapse show" id="filtercollapse3">
                                <div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-primary"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-secondary"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-danger"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-success"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-warning"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-info"></i>
                                  </div>
                                  <div class="form-check form-check-inline color-checkbox">
                                    <input class="form-check-input" type="checkbox" />
                                    <i class="fas fa-circle text-dark"></i>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item border-0 px-0 py-2">
                              <a class="btn border-0 px-0 text-start w-100 pb-0" data-bs-toggle="collapse" href="#filtercollapse4">
                                <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                Price
                              </a>
                              <div class="collapse show" id="filtercollapse4">
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter1" value="option1" />
                                      <label class="form-check-label" for="pricefilter1">Below $10</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter2" value="option2" />
                                      <label class="form-check-label" for="pricefilter2">$50 - $100</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter3" value="option3" />
                                      <label class="form-check-label" for="pricefilter3">$150 - $200</label>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter4" value="option1" />
                                      <label class="form-check-label" for="pricefilter4">$10 - $50</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter5" value="option2" />
                                      <label class="form-check-label" for="pricefilter5">$100 - $150</label>
                                    </div>
                                    <div class="form-check my-2">
                                      <input class="form-check-input" type="radio" name="price" id="pricefilter6" value="option3" />
                                      <label class="form-check-label" for="pricefilter6">Over $200</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item border-0 px-0 py-2">
                              <a class="btn border-0 px-0 text-start w-100 pb-2" data-bs-toggle="collapse" href="#filtercollapse5">
                                <div class="float-end"><i class="ti ti-chevron-down"></i></div>
                                Rating
                              </a>
                              <div class="collapse show" id="filtercollapse5">
                                <div>
                                  <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="chkratt1" />
                                    <label class="form-check-label" for="chkratt1">4★ &amp; above</label>
                                  </div>
                                  <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="chkratt2" />
                                    <label class="form-check-label" for="chkratt2">3★ &amp; above</label>
                                  </div>
                                  <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="chkratt3" />
                                    <label class="form-check-label" for="chkratt3">2★ &amp; above</label>
                                  </div>
                                  <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="chkratt4" />
                                    <label class="form-check-label" for="chkratt4">1★ &amp; above</label>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item border-0 px-0 py-2">
                              <a href="#" class="btn btn-light-danger w-100">Clear All</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="ecom-content">
              <div class="d-sm-flex align-items-center mb-4">
                <ul class="list-inline me-auto my-1">
                  <li class="list-inline-item">
                    <form class="form-search">
                      <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                      <input type="search" class="form-control" placeholder="Search Products" />
                    </form>
                  </li>
                </ul>
                <ul class="list-inline ms-auto my-1">
                  <li class="list-inline-item">
                    <select class="form-select">
                      <option>Price: High To Low</option>
                      <option>Price: Low To High</option>
                      <option>Popularity</option>
                      <option>Discount</option>
                      <option>Fresh Arrivals</option>
                    </select>
                  </li>
                  <li class="list-inline-item align-bottom">
                    <a
                      href="#"
                      class="d-xxl-none btn btn-link-secondary"
                      data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvas_mail_filter">
                      <i class="ti ti-filter f-16"></i> Filter
                    </a>
                    <a
                      href="#"
                      class="d-none d-xxl-inline-flex btn btn-link-secondary"
                      data-bs-toggle="collapse"
                      data-bs-target="#ecom-filter">
                      <i class="ti ti-filter f-16"></i> Filter
                    </a>
                  </li>
                </ul>
              </div>

              <a href="create/">
                <button type="button" class="btn btn-primary">
                  agregar 
                </button>
              </a>
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
                          <a href="<?= BASE_PATH ?> /products/detail/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">Details</a>
                          <button type="button" class="btn btn-warning">
                            Edit
                          </button>
                          <form action="../../app/ProductsController.php" id='delete-form-<?php echo htmlspecialchars($product['id']) ?>' method="POST">
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
                          <form id="modalFormEdit" method="POST" action="../../app/ProductsController.php?id=<?php echo htmlspecialchars($product['id']); ?>">
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
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
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

  <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas" aria-labelledby="productOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="productOffcanvasLabel">Product Details</h5>
      <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
        <i class="ti ti-x f-20"></i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="card product-card shadow-none border-0">
        <div class="card-img-top p-0">
          <a href="ecom_product-details.html">
            <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
          </a>
          <div class="card-body position-absolute end-0 top-0">
            <div class="form-check prod-likes">
              <input type="checkbox" class="form-check-input" />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-heart prod-likes-icon">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </div>
          </div>
          <div class="card-body position-absolute start-0 top-0">
            <span class="badge bg-danger badge-prod-card">30%</span>
          </div>
        </div>
      </div>
      <h5>Glitter gold Mesh Walking Shoes</h5>
      <p class="text-muted">Image Enlargement: After shooting, you can enlarge photographs of the objects for clear zoomed view. Change In Aspect Ratio:
        Boldly crop the subject and save it with a composition that has impact.</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Price</p>
            <h4 class="mb-0"><b>$299.00</b><span class="mx-2 f-14 text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Categories</p>
            <h6 class="mb-0">Shoes</h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Status</p>
            <h6 class="mb-0"><span class="badge bg-warning rounded-pill">Process</span></h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Brands</p>
            <h6 class="mb-0"><img src="<?= BASE_PATH ?>assets/images/application/img-prod-brand-1.png" alt="user-image" class="wid-40" /></h6>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>