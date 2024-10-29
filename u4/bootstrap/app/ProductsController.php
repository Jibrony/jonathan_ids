<?php 
	if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

class ProductsController 
{
	
	public function getProducts()
	{
        session_start();

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
        session_start();

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
}

?>