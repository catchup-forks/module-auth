<?php

namespace App\Modules\Auth\Providers;

use App\Modules\Core\Providers\BaseEventsProvider;
use App\Modules\Auth;

class AuthEventsProvider extends BaseEventsProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*
         * AuthController@postLogin
         * AuthController@postRegister
         */
        'App\Modules\Auth\Events\UserHasLoggedIn' => [
            'App\Modules\Auth\Events\Handlers\CheckFor2Fa',
            'App\Modules\Auth\Events\Handlers\CheckForExpiredPassword',
            'App\Modules\Auth\Events\Handlers\CheckForEmptyEmail',
            'App\Modules\Auth\Events\Handlers\UpdateLastLogin',
        ],

        /*
         * AuthController@postRegister
         */
        'App\Modules\Auth\Events\UserIsRegistering' => [
        ],

        /*
         * AuthController@postRegister
         */
        'App\Modules\Auth\Events\UserHasRegistered' => [
        ],

        /*
         * SecurityController@postRegister
         */
        'App\Modules\Auth\Events\UserPasswordWasChanged' => [
            'App\Modules\Auth\Events\Handlers\RemovePasswordChangeLock',
        ],

        'App\Modules\Admin\Events\GotDatatableConfig' => [
            'App\Modules\Auth\Events\Handlers\ManipulateUserPermissionsDatatable',
            'App\Modules\Auth\Events\Handlers\ManipulateUserApiKeyDatatable',
            'App\Modules\Auth\Events\Handlers\ManipulateRoleUsersDatatable',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [

    ];

    /**
     * Register any other events for your application.
     */
    public function boot()
    {
        parent::boot();

        // clear acp badge caches
        $models = [
            'User', 'Role', 'ApiKey',
        ];

        foreach ($models as $model) {
            $path = 'App\\Modules\\Auth\\Models\\'.$model;
            $path::saved(function () use ($model) {
                \Cache::forget('sidebar.auth.'.strtolower($model).'.count');
            });
        }
    }
}
