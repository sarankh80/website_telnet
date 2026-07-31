<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::with('user')
            ->when($request->user_id, fn($q) => $q->where('user_id', $request->user_id))
            ->when($request->action, fn($q) => $q->where('action', $request->action))
            ->when($request->date, fn($q) => $q->whereDate('created_at', $request->date))
            ->latest('created_at')
            ->get();

        $users   = User::orderBy('name')->pluck('name', 'id');
        $actions = ['login', 'logout', 'create', 'update', 'delete', 'view'];

        return view('admin.activity-logs.index', compact('logs', 'users', 'actions'));
    }

    public function clear(Request $request)
    {
        $days = (int) $request->input('days', 30);
        ActivityLog::where('created_at', '<', now()->subDays($days))->delete();
        return back()->with('success', "Cleared logs older than {$days} days.");
    }
}
