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
            $addController = new AddProductController();
            $addController->addProduct($name, $slug, $description, $features);
            break;
    }
}

class AddProductController
{
    public function addProduct($name, $slug, $description, $features)
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
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name, 'slug' => $slug, 'description' => $description, 'features' => $features),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['token']
        )
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;
}

}
?>
