<?php

namespace App\Services;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ChatGPTService
{
    protected $apiKey;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->apiKey = config('openai.api_key');
    }

    public function sendMessage(string $message, string $model = 'gpt-3.5-turbo'): JsonResponse
    {
        try {
            $url = 'https://api.openai.com/v1/chat/completions';

            $header = [
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type'  => 'application/json',
            ];

            $data = [
                'model'    => $model,
                'messages' => [
                    [
                        'role'    => 'user',
                        'content' => $message
                    ],
                ],
            ];

            $response = Http::withHeaders($header)->post($url, $data);

            return response()->json([
                'message' => $response->successful() ? 'Message sent successfully.' : 'ChatGPT API Failed.',
                'data'    => $response->json(),
                // 'data'    => $response->successful() ? $response->json()['choices'][0]['message']['content'] : $response->json(),
            ], $response->status());
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to send message.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
