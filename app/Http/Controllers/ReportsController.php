<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RBAC\Permissions\ReportPermission;

class ReportsController extends Controller
{

    public function index()
    {
        $this->checkAccess->forUser(auth()->user(), ReportPermission::VIEW);

        return view("reports.index");
    }
}
