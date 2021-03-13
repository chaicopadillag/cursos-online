<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view-role')->only('index');
        $this->middleware('can:create-role')->only('create', 'store');
        $this->middleware('can:update-role')->only('edit', 'update');
        $this->middleware('can:delete-role')->only('destroy');
    }
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.create', ['permissions' => $permissions]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'permissions' => 'required',
        ]);
        try {
            $role = Role::create(['name' => $request->input('name')]);
            $role->permissions()->attach($request->input('permissions'));
            return redirect()->route('dashboard.roles.index')->with('success', 'El rol se creo satisfactoriamane');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.roles.index')->with('error', 'Error en registrar el nuevo rol, ERROR: ' . $e->getMessage());

        }

    }

    public function show(Role $role)
    {
        return view('dashboard.roles.show', ['role' => $role]);

    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('dashboard.roles.edit', ['role' => $role, 'permissions' => $permissions]);

    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'        => 'required',
            'permissions' => 'required',
        ]);

        try {
            $role->permissions()->sync($request->input('permissions'));
            $role->update(['name' => $request->input('name')]);
            return redirect()->route('dashboard.roles.index')->with('success', 'El rol se actualizó satisfactoriamane');

        } catch (\Exception$e) {
            return redirect()->route('dashboard.roles.index')->with('error', 'Error en actualizar el rol, ERROR: ' . $e->getMessage());

        }

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('dashboard.roles.index')->with('success', 'Rol eliminado correctamente');

    }
}
