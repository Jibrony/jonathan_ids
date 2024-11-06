<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

var_dump($_POST);

var_dump($_GET);

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'editProduct':
            //Sin el id no se puede editar el producto
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            };
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $features = $_POST['features'];

            $productController = new ProductsController();
            $productController->updateProduct($id, $name, $slug, $description, $features);
            break;
        case 'deleteProduct':
            $id = $_POST["id"];
            $deleteController = new ProductsController();
            $deleteController->deleteProduct($id);
            break;
    }
}

class ProductsController
{

    public function getProducts()
    {

        if (!isset($_SESSION['token'])) {
            header('Location: ../index.html');
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $allProducts = json_decode($response, true)['data'] ?? [];

        return $allProducts;
    }

    public function getProductBySlug($productSlug)
    {

        if (!isset($_SESSION['token'])) {
            header('Location: ../index.html');
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . urlencode($productSlug),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Error en la solicitud: ' . curl_error($curl);
            exit;
        }

        curl_close($curl);

        $productData = json_decode($response, true);

        return $productData['data'] ?? null;
    }

    public function updateProduct($id, $name, $slug, $description, $features)
    {
        $newDataProduct = "name=" . urlencode($name) . "&slug=" . urlencode($slug) . "&description=" . urlencode($description) . "&features=" . urlencode($features) . "&id=" . urlencode($id);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $newDataProduct,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $_SESSION['token']
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            header('Location: ../views/products/');
        } else {
            echo 'Error al actualizar el producto';
        }
    }

    public function deleteProduct($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.urlencode($id),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);


        if (isset($response->code) && $response->code > 0) {
            header('Location: ../views/home?status=palobby');
        } else {
            echo 'Error al actualizar el producto';
        }
    }
}
