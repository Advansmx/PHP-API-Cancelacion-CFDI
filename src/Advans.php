<?php


namespace Advans\Api\CancelacionCFDI;

use Exception;

class Advans {

    protected $config = [];

    public function __construct($config) {
        $this->config = array_merge(['use_exceptions' => true], $config);
    }

    public function Cancelar($PrivateKeyPem, $PublicKeyPem, $Uuid, $RfcReceptor, $Total, $Motivo, $FolioSustitucion = '') {
        return $this->call(__FUNCTION__, [
            'PrivateKeyPem' => $PrivateKeyPem,
            'PublicKeyPem' => $PublicKeyPem,
            'Uuid' => $Uuid,
            'RfcReceptor' => $RfcReceptor,
            'Total' => $Total,
            'Motivo' => $Motivo,
            'FolioSustitucion' => $FolioSustitucion,
        ]);
    }

    public function ConsultarEstado($Uuid) {
        return $this->call(__FUNCTION__, [
            'Id' => $Uuid,
        ]);
    }

    public function ConsultarEstadoSolicitud($Id) {
        return $this->call(__FUNCTION__, [
            'Id' => $Id,
        ]);
    }

    public function ConsultarEstadoSolicitudSAT($Uuid, $RfcEmisor, $RfcReceptor, $Total) {
        return $this->call(__FUNCTION__, [
            'Uuid' => $Uuid,
            'RfcEmisor' => $RfcEmisor,
            'RfcReceptor' => $RfcReceptor,
            'Total' => $Total,
        ]);
    }

    public function ConsultarAutorizacionesPendientes($PrivateKeyPem, $PublicKeyPem) {
        $response = $this->call(__FUNCTION__, [
            'PrivateKeyPem' => $PrivateKeyPem,
            'PublicKeyPem' => $PublicKeyPem
        ]);
        if ($response->ListaFolios) {
            $response->ListaFolios = explode(",", $response->ListaFolios);
        } else {
            $response->ListaFolios = [];
        }
        return $response;
    }

    public function AutorizarCancelacion($PrivateKeyPem, $PublicKeyPem, $Uuid, $Respuesta) {
        $response = $this->call(__FUNCTION__, [
            'PrivateKeyPem' => $PrivateKeyPem,
            'PublicKeyPem' => $PublicKeyPem,
            'Uuid' => $Uuid,
            'Respuesta' => $Respuesta
        ]);

        return $response;
    }

    protected function call($method, $params) {
        $curl = curl_init();

        $post_fields = [
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => md5(openssl_random_pseudo_bytes(32)),
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config['endpoint'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_fields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: ' . $this->config['key'],
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        if (!$response) {
            throw new Exception('No se obtuvo respuesta');
        }
        $response = json_decode($response);

        if (isset($response->error)) {
            if ($this->config['use_exceptions']) {
                throw new Exception(@$response->error->code . ': ' . @$response->error->string);
            } else {
                return $response;
            }
        }

        return $response;

    }

}