<?php



class BrandController
{
    public function getAllBrands()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 130|VWhjXnncQGInohnHeCfPYQW6Md2RUHG9yRs1cjt3'
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Error en la solicitud: ' . curl_error($curl);
            exit;
        }

        curl_close($curl);

        $brandData = json_decode($response);

        if (isset($brandData->code) && $brandData->code === 4) {
            return $brandData->data;
        } else {
            return [];
        }
    }
}
