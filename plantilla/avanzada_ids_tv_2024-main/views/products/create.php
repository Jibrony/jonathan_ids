<?php

include "../../app/config.php";
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
                <li class="breadcrumb-item" aria-current="page">Add New Product</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Add New Product</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
              <h5>Product description</h5>
            </div>
            <form id=" modalFormAdd" enctype="multipart/form-data" method="POST" action="<?= BASE_PATH ?>/app/AddProductController.php">
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
              <div class="mb-3">
                <label for="uploadedfile" class="form-label">Upload File</label>
                <input name="uploadedfile" type="file" class="form-control" accept=".png, .jpg, .jpeg" />
              </div>
              <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select id="brand" name="brand_id" class="form-select" required>
                  <?php if (isset($brands) && count($brands) > 0): ?>
                    <?php foreach ($brands as $brand): ?>
                      <option value="<?php echo htmlspecialchars($brand->id); ?>">
                        <?php echo htmlspecialchars($brand->name); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option value="">No brands available</option>
                  <?php endif; ?>
                </select>
              </div>


              <input type="hidden" name="action" value="addProduct">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

          </div>
        </div>
        <!-- <div class="col-sm-12">
          <div class="card">
            <div class="card-body text-end btn-page">
              <button class="btn btn-primary mb-0">Save product</button>
              <button class="btn btn-outline-secondary mb-0">Reset</button>
            </div>
          </div>
        </div> -->
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>