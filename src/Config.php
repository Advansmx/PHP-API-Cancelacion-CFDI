<?php

namespace Advans\Api\CancelacionCFDI;

use Exception;

class Config {
    public $endpoint, $key, $use_exceptions;

    public function __construct($args) {
        $this->endpoint = $args['endpoint'] ?? null;
        if (!$this->base_url) {
            throw new Exception('base_url is required');
        }
        if (substr($this->base_url, -1, 1) != '/') {
            $this->base_url .= '/';
        }

        $this->key = $args['key'] ?? null;
        if (!$this->key) {
            throw new Exception('key is required');
        }

        $this->use_exceptions = $args['use_exceptions'] ?? false;
    }
}