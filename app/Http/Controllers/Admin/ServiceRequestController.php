<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceRequest::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        $requests = $query->get();
        return view('admin.service-requests.index', compact('requests'));
    }

    public function show(ServiceRequest $serviceRequest)
    {
        return view('admin.service-requests.show', ['request' => $serviceRequest]);
    }

    public function updateStatus(Request $request, ServiceRequest $serviceRequest)
    {
        $request->validate(['status' => ['required', 'in:new,contacted,in_progress,completed,cancelled']]);
        $serviceRequest->update(['status' => $request->status]);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        return redirect()->route('admin.service-requests.index')->with('success', 'Request deleted.');
    }
}
