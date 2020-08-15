<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('modules.backend.user.index');
    }

    public function getDataTable()
    {
        $user = User::paginate(10);

        return response()->json($user);
    }

    public function showCreate(Request $request)
    {
        return redirect()->route('user-show-create');
    }
}
