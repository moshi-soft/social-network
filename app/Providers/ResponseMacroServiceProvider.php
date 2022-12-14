<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
class ResponseMacroServiceProvider extends ServiceProvider
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
    public function boot()
    {
        Response::macro('success', function (string $message, object|array $data=[],int $status = 200) {
            return Response::json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ],$status);
        });

        Response::macro('error', function (string $message, object|array $data=[], int $status = 400) {
            return Response::json([
                'success' => false,
                'message' => $message,
                'errors' => $data,
            ], $status);
        });
    }
}
