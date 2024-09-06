<?php

declare(strict_types=1);

namespace pyStack\App\Clients;

class Anthropic
{
    private $client;
    private $operator;
    private $builtins;
    private $anthropic;

    public function __construct()
    {
        $this->anthropic = \PyCore::import('anthropic');
        $this->client = $this->anthropic->Anthropic();
    }

    public function createMessage(string $content, string $model = "claude-3-5-sonnet-20240620", int $maxTokens = 8192, string $role = "user", bool $stream = false): string
    {
        $message = $this->client->messages->create(
            model: $model,
            max_tokens: $maxTokens,
            stream: $stream,
            messages: new \PyList([
                new \PyDict([
                    "role" => $role,
                    "content" => $content,
            ])])
        );

        return \PyCore::scalar($message->content[0]->text);
    }
}
    