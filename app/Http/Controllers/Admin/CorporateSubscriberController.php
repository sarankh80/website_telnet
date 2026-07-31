<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CorporateSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = CorporateSubscriber::orderBy('sort_order')->orderBy('company_name')->get();
        return view('admin.corporate-subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.corporate-subscribers.form', ['subscriber' => new CorporateSubscriber()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name'    => ['required', 'string', 'max:255'],
            'company_name_km' => ['required', 'string', 'max:255'],
            'logo'            => ['nullable', 'image', 'max:2048'],
            'industry'        => ['nullable', 'string', 'max:150'],
            'industry_km'     => ['nullable', 'string', 'max:150'],
            'website'         => ['nullable', 'url', 'max:255'],
            'contact_person'  => ['nullable', 'string', 'max:150'],
            'contact_email'   => ['nullable', 'email', 'max:150'],
            'contact_phone'   => ['nullable', 'string', 'max:50'],
            'description'     => ['nullable', 'string'],
            'description_km'  => ['nullable', 'string'],
            'is_active'       => ['nullable', 'boolean'],
            'sort_order'      => ['nullable', 'integer'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('corporate-subscribers', 'public');
        }
        CorporateSubscriber::create($data);
        return redirect()->route('admin.corporate-subscribers.index')
                         ->with('success', 'Corporate subscriber added.');
    }

    public function edit(CorporateSubscriber $corporateSubscriber)
    {
        return view('admin.corporate-subscribers.form', ['subscriber' => $corporateSubscriber]);
    }

    public function update(Request $request, CorporateSubscriber $corporateSubscriber)
    {
        $data = $request->validate([
            'company_name'    => ['required', 'string', 'max:255'],
            'company_name_km' => ['required', 'string', 'max:255'],
            'logo'            => ['nullable', 'image', 'max:2048'],
            'industry'        => ['nullable', 'string', 'max:150'],
            'industry_km'     => ['nullable', 'string', 'max:150'],
            'website'         => ['nullable', 'url', 'max:255'],
            'contact_person'  => ['nullable', 'string', 'max:150'],
            'contact_email'   => ['nullable', 'email', 'max:150'],
            'contact_phone'   => ['nullable', 'string', 'max:50'],
            'description'     => ['nullable', 'string'],
            'description_km'  => ['nullable', 'string'],
            'is_active'       => ['nullable', 'boolean'],
            'sort_order'      => ['nullable', 'integer'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('logo')) {
            if ($corporateSubscriber->logo) {
                Storage::disk('public')->delete($corporateSubscriber->logo);
            }
            $data['logo'] = $request->file('logo')->store('corporate-subscribers', 'public');
        }
        $corporateSubscriber->update($data);
        return redirect()->route('admin.corporate-subscribers.index')
                         ->with('success', 'Corporate subscriber updated.');
    }

    public function destroy(CorporateSubscriber $corporateSubscriber)
    {
        if ($corporateSubscriber->logo) {
            Storage::disk('public')->delete($corporateSubscriber->logo);
        }
        $corporateSubscriber->delete();
        return redirect()->route('admin.corporate-subscribers.index')
                         ->with('success', 'Subscriber deleted.');
    }
}
