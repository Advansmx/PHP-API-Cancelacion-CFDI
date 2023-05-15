# advans/php-api-cancelacion-cfdi

[![Latest Stable Version](https://img.shields.io/packagist/v/advans/php-api-cancelacion-cfdi?style=flat-square)](https://packagist.org/packages/advans/php-api-cancelacion-cfdi)
[![Total Downloads](https://img.shields.io/packagist/dt/advans/php-api-cancelacion-cfdi?style=flat-square)](https://packagist.org/packages/advans/php-api-cancelacion-cfdi)

## Instalación usando Composer

```sh
$ composer require advans/php-api-cancelacion-cfdi
```

## Ejemplo

````
$config = new \Advans\Api\CancelacionCFDI\Config([
    'endpoint' => 'https://dev.advans.mx/cfdi-cancelacion/json-rpc-2.0',
    'key' => '**********************',
    'use_exceptions' => false,
]);
$servicio_cancelacion = new \Advans\Api\CancelacionCFDI\CancelacionCFDI($config);

$Uuid = 'FFFFFFFF-23F0-BA48-CD4E-405E97430D31';
$response = $servicio_cancelacion->ConsultarEstadoSolicitud($Uuid);
````

## Configuración

| Parámetro | Valor por defecto | Descripción |
| :--- | :--- | :--- |
| endpoint | null | URL de la API |
| key | null | API Key |
| use_exceptions | true | Define si una respuesta con error dispara un Exception |
