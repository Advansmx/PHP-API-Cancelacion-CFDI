<?php

require_once '../vendor/autoload.php';

$advans = new \Advans\Api\CancelacionCFDI\Advans([
    'endpoint' => 'https://dev.advans.mx/cfdi-cancelacion/json-rpc-2.0',
    'key' => '**********************',
    'use_exceptions' => false,
]);

$Uuid = 'FFFFFFFF-23F0-BA48-CD4E-405E97430D31';
$response = $advans->ConsultarEstadoSolicitud($Uuid);

var_dump($response);
