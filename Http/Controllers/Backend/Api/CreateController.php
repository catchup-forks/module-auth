<?php

namespace App\Modules\Auth\Http\Controllers\Backend\Api;

use App\Modules\Auth as Auth;

class CreateController extends BaseApiController
{
    public function getForm(Auth\Models\ApiKey $key)
    {
        $data = $this->getApiKeyDetails($key);

        return $this->setView('admin.key.edit-basic', $data);
    }
}
