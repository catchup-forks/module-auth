<?php

namespace App\Modules\Auth\Http\Controllers\Backend;

use App\Modules\Core\Http\Controllers\BaseBackendController;
use App\Modules\Auth\Datatables\RoleManager;
use App\Modules\Admin\Traits\DataTableTrait;

class RoleManagerController extends BaseBackendController
{
    use DataTableTrait;

    public function roleManager()
    {
        return $this->renderDataTable(with(new RoleManager())->boot());
    }
}
