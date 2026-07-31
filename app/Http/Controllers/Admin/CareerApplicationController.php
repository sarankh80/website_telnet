<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = CareerApplication::with('career')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('career_id')) {
            $query->where('career_id', $request->career_id);
        }

        $applications = $query->get();
        $careers = \App\Models\Career::orderBy('title')->get();
        return view('admin.career-applications.index', compact('applications', 'careers'));
    }

    public function show(CareerApplication $careerApplication)
    {
        return view('admin.career-applications.show', ['app' => $careerApplication->load('career')]);
    }

    public function updateStatus(Request $request, CareerApplication $careerApplication)
    {
        $request->validate([
            'status'      => ['required', 'in:new,reviewing,shortlisted,rejected,hired'],
            'admin_notes' => ['nullable', 'string'],
        ]);
        $careerApplication->update($request->only('status', 'admin_notes'));
        return back()->with('success', 'Status updated.');
    }

    public function destroy(CareerApplication $careerApplication)
    {
        Storage::disk('public')->delete($careerApplication->cv_path);
        $careerApplication->delete();
        return redirect()->route('admin.career-applications.index')->with('success', 'Application deleted.');
    }
}
