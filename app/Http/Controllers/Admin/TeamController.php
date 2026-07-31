<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::orderBy('sort_order')->get();
        return view('admin.teams.index', compact('members'));
    }

    public function create()
    {
        return view('admin.teams.form', ['member' => new Team()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_km'     => ['required', 'string', 'max:200'],
            'name_en'     => ['required', 'string', 'max:200'],
            'position_km' => ['required', 'string', 'max:200'],
            'position_en' => ['required', 'string', 'max:200'],
            'phone'       => ['nullable', 'string', 'max:50'],
            'email'       => ['nullable', 'email', 'max:150'],
            'telegram'    => ['nullable', 'string', 'max:100'],
            'photo'       => ['nullable', 'image', 'max:2048'],
            'sort_order'  => ['nullable', 'integer'],
            'is_ceo'      => ['nullable', 'boolean'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teams', 'public');
        }
        $data['is_ceo']    = $request->boolean('is_ceo');
        $data['is_active'] = $request->boolean('is_active');

        Team::create($data);
        return redirect()->route('admin.teams.index')->with('success', 'Team member created.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.form', ['member' => $team]);
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name_km'     => ['required', 'string', 'max:200'],
            'name_en'     => ['required', 'string', 'max:200'],
            'position_km' => ['required', 'string', 'max:200'],
            'position_en' => ['required', 'string', 'max:200'],
            'phone'       => ['nullable', 'string', 'max:50'],
            'email'       => ['nullable', 'email', 'max:150'],
            'telegram'    => ['nullable', 'string', 'max:100'],
            'photo'       => ['nullable', 'image', 'max:2048'],
            'sort_order'  => ['nullable', 'integer'],
            'is_ceo'      => ['nullable', 'boolean'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('photo')) {
            if ($team->photo) Storage::disk('public')->delete($team->photo);
            $data['photo'] = $request->file('photo')->store('teams', 'public');
        }
        $data['is_ceo']    = $request->boolean('is_ceo');
        $data['is_active'] = $request->boolean('is_active');

        $team->update($data);
        return redirect()->route('admin.teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        if ($team->photo) Storage::disk('public')->delete($team->photo);
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted.');
    }
}
