<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::withCount('roles')
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.form', ['permission' => new Permission]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:permissions'],
        ]);

        $permission = Permission::create(['name' => $data['name'], 'guard_name' => 'web']);

        ActivityLog::log('create', "Created permission '{$permission->name}'");
        return redirect()->route('admin.permissions.index')->with('success', "Permission '{$permission->name}' created.");
    }

    public function edit(Permission $permission)
    {
        $permission->load('roles');
        return view('admin.permissions.form', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:permissions,name,' . $permission->id],
        ]);

        $old = $permission->name;
        $permission->update(['name' => $data['name']]);

        ActivityLog::log('update', "Renamed permission '{$old}' → '{$permission->name}'");
        return redirect()->route('admin.permissions.index')->with('success', "Permission updated.");
    }

    public function destroy(Permission $permission)
    {
        $name = $permission->name;
        $permission->delete();

        ActivityLog::log('delete', "Deleted permission '{$name}'");
        return redirect()->route('admin.permissions.index')->with('success', "Permission '{$name}' deleted.");
    }
}
