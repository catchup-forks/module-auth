<?php

namespace App\Modules\Auth\Http\Controllers\Backend;

use App\Modules\Core\Http\Controllers\BaseBackendController;
use App\Modules\Auth\Datatables\ApiKeyManager;
use App\Modules\Admin\Traits\DataTableTrait;

class ApiManagerController extends BaseBackendController
{
    use DataTableTrait;

    public function manager()
    {
        return $this->renderDataTable(with(new ApiKeyManager())->boot());
    }
}
