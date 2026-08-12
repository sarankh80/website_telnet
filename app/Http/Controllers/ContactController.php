<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Http\Requests\ServiceRequestForm;
use App\Models\ContactMessage;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function support()
    {
        return view('pages.support');
    }

    public function store(ContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function serviceRequest(ServiceRequestForm $request): JsonResponse
    {
        ServiceRequest::create(array_merge(
            $request->validated(),
            ['ip_address' => $request->ip()]
        ));

        return response()->json(['success' => true]);
    }
}
