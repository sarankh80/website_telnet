<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Team;

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
        ];

        $recentRequests = ServiceRequest::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentRequests', 'recentMessages'));
    }
}
