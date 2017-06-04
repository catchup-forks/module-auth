<?php

namespace App\Modules\Auth\Http\Controllers\Backend\User;

use App\Modules\Core\Http\Controllers\BaseBackendController;
use App\Modules\Auth\Models\User;
use Former;

class BaseUserController extends BaseBackendController
{
    public function boot()
    {
        parent::boot();

        $this->theme->setTitle('User Manager');
        $this->theme->breadcrumb()->add('User Manager', route('admin.user.manager'));
    }

    public function getUserDetails(User $user)
    {
        $this->theme->setTitle('User: '.e($user->screenname));
        $this->theme->breadcrumb()->add($user->screenname, route('admin.user.edit', $user->id));

        Former::populate($user);

        return compact('user');
    }
}
