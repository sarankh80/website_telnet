<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Branch;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Team;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'         => Service::count(),
            'branches'         => Branch::count(),
            'team'             => Team::count(),
            'service_requests' => ServiceRequest::count(),
            'new_requests'     => ServiceRequest::where('status', 'new')->count(),
            'messages'         => ContactMessage::count(),
            'unread_messages'  => ContactMessage::where('is_read', false)->count(),
            'users'            => User::count(),
        ];

        $recentActivity = ActivityLog::with('user')->latest('created_at')->take(8)->get();

        $recentRequests = ServiceRequest::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentRequests', 'recentMessages', 'recentActivity'));
    }
}
