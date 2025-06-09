<?php

namespace App\Providers;

use App\Contracts\ChatGPTServiceInterface;
use App\Services\ChatGPTService;
use Illuminate\Support\ServiceProvider;

class ChatGPTServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ChatGPTServiceInterface::class, ChatGPTService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
