<?php

namespace App\Config;

use Dotenv\Dotenv;

class Config
{
    public function __construct()
    {
        $this->load();
    }

    public function load()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public static function get(string $key)
    {
        return $_ENV[$key];
    }
}