<?php

namespace App\Modules\Auth\Http\Controllers\Backend;

use App\Modules\Core\Http\Controllers\BaseBackendController;
use App\Modules\Auth\Datatables\UserManager;
use App\Modules\Admin\Traits\DataTableTrait;

class UserManagerController extends BaseBackendController
{
    use DataTableTrait;

    public function userManager()
    {
        return $this->renderDataTable(with(new UserManager())->boot());
    }
}
