<?php

namespace App\Http\Controllers;

use App\DataTables\ManageUserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index(ManageUserDataTable $dataTable)
    {
        return $dataTable->render('admin.manage-user.index');
    }

    public function create()
    {
        return view('admin.manage-user.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
