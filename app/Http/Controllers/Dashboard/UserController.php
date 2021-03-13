<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:view-users')->only('index');
        $this->middleware('can:update-users')->only('edit', 'update');
    }
    public function index()
    {
        return view('dashboard.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', ['user' => $user, 'roles' => $roles]);

    }
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->input('roles'));

        return redirect()->back();

    }

}
