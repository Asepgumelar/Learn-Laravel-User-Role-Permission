<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Str;


class PermissionController extends Controller
{
    public function index()
    {
        return view('modules.backend.permission.index');
    }

    public function getDataTable()
    {
        $user = Permission::latest()->get();

        return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($user){
                    $btn = '<a href="javascript:void(0)" class="btn btn-link text-info"><i class="fa fa-eye"></i> Detail</a>
                            <a href="javascript:void(0)" class="btn btn-link text-info"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-link text-info" onclick="deleteUser(' . $user->id . ')" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-alt"></i> Delete</a>
                            <a href="javascript:void(0)" class="btn btn-link text-info"><i class="far fa-copy"></i> Clone</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->editColumn('created_at', function ($user) {
                    return $user->created_at ? with(new Carbon($user->created_at))->format('d F Y') : '';
                })
                ->make(true);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'name'     => ['required', 'string', 'max:255'],
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $permission           = new Permission();
            $permission->name     = $request->input('name');
            $permission->slug     = Str::slug($permission->name);
            $permission->save();

            DB:: commit();

            return back()
                ->with('status', 'Permission has been created');
        }

        catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            abort(500);
        }
    }

    public function delete()
    {
        try {
            $data = Permission::findOrFail($request->id);
            $data->delete();

            return response()->json(['code' => 200, 'message' => 'ok'], 200);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['code' => 400, 'message' => 'error' . $e->getMessage()], 400);
        }
    }
}
