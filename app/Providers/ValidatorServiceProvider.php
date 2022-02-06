<?php
namespace App\Providers;

use App\Services\CustomValidator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
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
        \Validator::resolver(function($translator, $data, $rules, $messages, $customAttributes)
        {
            return new CustomValidator($translator, $data, $rules, $messages, $customAttributes);
        });
    }
}