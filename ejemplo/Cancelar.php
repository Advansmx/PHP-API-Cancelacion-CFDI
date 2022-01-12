<?php

require_once '../vendor/autoload.php';

$advans = new \Advans\Api\CancelacionCFDI\Advans([
    'endpoint' => 'https://dev.advans.mx/cfdi-cancelacion/json-rpc-2.0',
    'key' => '*************************',
]);

$PrivateKeyPem = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'private.key.pem');
$PublicKeyPem = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'public.cer.pem');

$Uuid = 'FFFFFFFF-23F0-BA48-CD4E-405E97430D31';
$RfcReceptor = 'BAJF541014RB3';
$Total = 5000;

$Motivo = '01';
$FolioSustitucion = 'FFFFFFFF-23F0-BA48-CD4E-405E97430D32';

$response = $advans->Cancelar($PrivateKeyPem, $PublicKeyPem, $Uuid, $RfcReceptor, $Total, $Motivo, $FolioSustitucion);

var_dump($response);
