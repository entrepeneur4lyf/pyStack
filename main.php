<?php

require 'vendor/autoload.php';

use pyStack\App\Clients\OpenAI;
use pyStack\App\Clients\Anthropic;

$claude = new Anthropic();

$gpt4o = new OpenAI();

try {
    $response = $claude->createMessage(
        "Is it possible to run Python from PHP?"
    );
    echo "Anthropic:\n\n";
    PyCore::print($response);
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

try {
    $response = $gpt4o->createMessage(
        "Is it possible to run Python from PHP?"
    );
    echo "\n\nOpenAI:\n\n";
    PyCore::print($response);
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}