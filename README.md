# webneex/consulta-cfdi-sat

[![Latest Stable Version](https://img.shields.io/packagist/v/advans/php-api-cancelacion-cfdi?style=flat-square)](https://packagist.org/packages/advans/php-api-cancelacion-cfdi)
[![Total Downloads](https://img.shields.io/packagist/dt/advans/php-api-cancelacion-cfdi?style=flat-square)](https://packagist.org/packages/advans/php-api-cancelacion-cfdi)

## Instalación usando Composer

```sh
$ composer require advans/php-api-cancelacion-cfdi
```

## Ejemplo

````
$advans = new \Advans\Api\CancelacionCFDI\Advans([
    'endpoint' => 'https://dev.advans.mx/cfdi-cancelacion/json-rpc-2.0',
    'key' => '**********************',
    'use_exceptions' => false,
]);

$Uuid = 'FFFFFFFF-23F0-BA48-CD4E-405E97430D31';
$response = $advans->ConsultarEstadoSolicitud($Uuid);
````