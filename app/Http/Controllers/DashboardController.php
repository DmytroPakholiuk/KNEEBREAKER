<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RBAC\AccessChecker;
use App\RBAC\Permissions\DashboardPermissions;

class DashboardController extends Controller
{

    public function index()
    {
        $this->checkAccess->forUser(auth()->user(), DashboardPermissions::VIEW);

        return view('dashboard.index');
    }
}
