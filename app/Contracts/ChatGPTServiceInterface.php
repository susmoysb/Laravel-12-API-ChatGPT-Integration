<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface ChatGPTServiceInterface
{
    public function sendMessage(string $message): JsonResponse;
}
