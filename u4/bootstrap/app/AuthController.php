<?php

session_start();

if(isset ($_POST['action'])){
    switch($_POST['action']){
        case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authController = new AuthController();
            $authController->login($email, $password);
            break;
    }
}

class AuthController {
    public function login($email, $password) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        $response = json_decode($response);
        if (isset ($response -> message) == 'Registro obtenido correctamente' && is_object($response -> data)) {
            // Redireccionar a home.html
            header('Location: ../home.html');
            exit();
        } else {
            header('Location: ../index.html');
        }
    }

    public function getProducts() {
        session_start();
        if (!isset($_SESSION['token'])) {
            header('Location: ../index.html');
            exit();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true)['data'] ?? [];
    }
}

?>
