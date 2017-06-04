<?php

namespace App\Modules\Auth\Http\Controllers\Backend;

use App\Modules\Core\Http\Controllers\BaseBackendController;
use App\Modules\Auth\Datatables\PermissionManager;
use App\Modules\Admin\Traits\DataTableTrait;

class PermissionManagerController extends BaseBackendController
{
    use DataTableTrait;

    public function permissionManager()
    {
        return $this->renderDataTable(with(new PermissionManager())->boot());
    }
}
