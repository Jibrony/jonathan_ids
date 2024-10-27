<?php
session_start();

class ProductController {
    private $apiUrl = 'https://crud.jonathansoto.mx/api/products';

    public function getProducts() {
        // Verifica que el token esté en la sesión
        if (!isset($_SESSION['token'])) {
            header('Location: index.html');
            exit();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $products = json_decode($response, true);
        return $products['data'] ?? [];
    }
}
?>
