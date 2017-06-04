<?php

namespace App\Modules\Auth\Repositories\Role;

use App\Modules\Core\Repositories\BaseEloquentRepository;
use App\Modules\Auth\Repositories\Role\RepositoryInterface as UserRepository;

class EloquentRepository extends BaseEloquentRepository implements UserRepository
{
    public function getModel()
    {
        return 'App\Modules\Auth\Models\Role';
    }
}
