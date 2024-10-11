<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RBAC\Permissions\ConfigurationPermissions;

class ConfigurationController extends Controller
{
    public function index()
    {
        $this->checkAccess->forUser(auth()->user(), ConfigurationPermissions::VIEW);

        return view("configuration.index");
    }
}
