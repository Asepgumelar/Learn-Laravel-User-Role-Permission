<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    public function index()
    {
        return view('modules.backend.permission.index');
    }
}
