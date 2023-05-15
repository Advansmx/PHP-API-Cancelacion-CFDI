<?php

namespace Advans\Api\CancelacionCFDI;

use Exception;

class Config {
    public $endpoint, $key, $use_exceptions;

    public function __construct($args) {
        $this->endpoint = $args['endpoint'] ?? null;
        if (!$this->endpoint) {
            throw new Exception('endpoint is required');
        }
        if (substr($this->endpoint, -1, 1) != '/') {
            $this->endpoint .= '/';
        }

        $this->key = $args['key'] ?? null;
        if (!$this->key) {
            throw new Exception('key is required');
        }

        $this->use_exceptions = $args['use_exceptions'] ?? false;
    }
}