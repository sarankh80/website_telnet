<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount(['permissions', 'users'])->orderBy('name')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get()
            ->groupBy(fn($p) => trim(preg_replace('/^(view|manage)\s+/', '', $p->name)));
        return view('admin.roles.form', ['role' => new Role, 'permissions' => $permissions, 'rolePermissions' => []]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => ['required', 'string', 'max:100', 'unique:roles'],
            'permissions'     => ['array'],
            'permissions.*'   => ['exists:permissions,name'],
        ]);

        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        $role->syncPermissions($data['permissions'] ?? []);

        ActivityLog::log('create', "Created role '{$role->name}'");
        return redirect()->route('admin.roles.index')->with('success', "Role '{$role->name}' created.");
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get()
            ->groupBy(fn($p) => trim(preg_replace('/^(view|manage)\s+/', '', $p->name)));
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.roles.form', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name'            => ['required', 'string', 'max:100', 'unique:roles,name,' . $role->id],
            'permissions'     => ['array'],
            'permissions.*'   => ['exists:permissions,name'],
        ]);

        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);

        ActivityLog::log('update', "Updated role '{$role->name}'");
        return redirect()->route('admin.roles.index')->with('success', "Role '{$role->name}' updated.");
    }

    public function destroy(Role $role)
    {
        if (in_array($role->name, ['super-admin', 'admin'])) {
            return back()->with('error', "Cannot delete system role '{$role->name}'.");
        }
        $name = $role->name;
        $role->delete();
        ActivityLog::log('delete', "Deleted role '{$name}'");
        return redirect()->route('admin.roles.index')->with('success', "Role '{$name}' deleted.");
    }
}
