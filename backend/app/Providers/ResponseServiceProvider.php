<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        // Success Response Macro
        $factory->macro('success', function ($data = null, $message = '', $statusCode = null) use ($factory) {
            $statusCode = $statusCode ?? 200;

            $response = [
                'statusCode' => $statusCode,
                'message' => $message,
                'data' => $data,
            ];

            return $factory->json($response, $statusCode);
        });

    }
}
