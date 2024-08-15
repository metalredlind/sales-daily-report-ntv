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
        $request->validate([
            'name' => ['required', 'max:200'],
            'username' => ['required', 'max:100', 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'title' => ['max:200'],
            'team' => ['max:200'],
            'role' => ['required'],
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->title = $request->title;
        $user->team = $request->team;
        $user->role = $request->role;
        $user->status = "active";

        $user->save();

        toastr('User baru berhasil ditambah', 'success', 'success');

        return redirect()->route('admin.manage-user.index');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.manage-user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'username' => ['required', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'title' => ['max:200'],
            'team' => ['max:200'],
            'role' => ['required'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->title = $request->title;
        $user->team = $request->team;
        $user->role = $request->role;
        $user->status = "active";

        $user->save();

        toastr('User info berhasil diupdate', 'success', 'success');

        return redirect()->route('admin.manage-user.index');
    }

    public function updatePassword(Request $request, string $id)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->password = bcrypt($request->password);

        $user->save();

        toastr('Password berhasil diedit', 'success', 'success');

        return redirect()->route('admin.manage-user.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response(['status' => 'success', 'message'=> 'User has been deleted successfully']);
    }
}
