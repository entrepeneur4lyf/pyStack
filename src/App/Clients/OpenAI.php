<?php

declare(strict_types=1);

namespace pyStack\App\Clients;

class OpenAI
{
    private $openai;
    private $client;

    public function __construct()
    {
        $this->openai = \PyCore::import('openai');
        $this->client = $this->openai->OpenAI();
    }

    public function createMessage(string $content, string $model = "gpt-4o", int $maxTokens = 4096, string $role = "user", bool $stream = false): string
    {
        $message = $this->client->chat->completions->create(messages: new \PyList([new \PyDict([
            "role" => $role,
            "content" => $content,
        ])]), model: $model);

        return \PyCore::scalar($message->choices[0]->message->content);
    }
}
