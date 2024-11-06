<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addProduct':
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description = $_POST['description'];
            $features = $_POST['features'];
            $brand_id = $_POST['brand_id'];
            $addController = new AddProductController();
            $addController->addProduct($name, $slug, $description, $features, $brand_id);
            break;
    }
}

class AddProductController
{
    public function addProduct($name, $slug, $description, $features, $brand_id)
    {
        if (!isset($_SESSION['token'])) {
            header('Location: ./login');
            exit();
        }

        $coverFile = isset($_FILES['uploadedfile']) && $_FILES['uploadedfile']['error'] === UPLOAD_ERR_OK
            ? new CURLFile($_FILES['uploadedfile']['tmp_name'], $_FILES['uploadedfile']['type'], $_FILES['uploadedfile']['name'])
            : null;

        $curl = curl_init();

        $postFields = array(
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'features' => $features,
            'brand_id' => $brand_id,
        );

        if ($coverFile !== null) {
            $postFields['cover'] = $coverFile;
        }


        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'slug' => $slug, 'description' => $description, 'features' => $features),
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        echo $response;
    }
}
