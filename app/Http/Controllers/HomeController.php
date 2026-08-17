<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\CorporateSubscriber;
use App\Models\Service;
use App\Models\Slugs;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $currentLocale = app()->getLocale();
        $services    = Service::active()->take(6)->get();
        $branches    = Branch::active()->get();
        $teamMembers = Team::active()->get();
        $ceo         = Team::active()->ceo()->first();
        $servicesSlugs = Slugs::all();
        return view('pages.home.index', compact('currentLocale', 'services', 'branches', 'teamMembers', 'ceo', 'servicesSlugs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function coverage()
    {
        $branches = Branch::active()->get();
        return view('pages.coverage', compact('branches'));
    }

    public function services()
    {
        $services = Service::active()->get();
        return view('pages.services', compact('services'));
    }

    public function kpi()
    {
        return view('pages.kpi');
    }

    public function team()
    {
        $teamMembers = Team::active()->get();
        $ceo         = Team::active()->ceo()->first();
        return view('pages.team', compact('teamMembers', 'ceo'));
    }

    public function business()
    {
        $services   = Service::active()->get();
        $corporates = CorporateSubscriber::active()->get();
        return view('pages.business', compact('services', 'corporates'));
    }

    public function portal()
    {
        return view('pages.portal');
    }
    public function career()
    {
        $careers = Career::active()->get();
        $branches = Branch::select(['id', 'name_en'])
            ->get()
            ->map(
                fn($value) =>
                "<option value='$value->id' "  . ">$value->name_en</option>"
            )
            ->implode('');
        $posts = [
            [
                "id" => 1,
                "name" => "Technical Support Engineering",
            ],
            [
                "id" => 2,
                "name" => "Network Infrastructure Engineering",
            ],
            [
                "id" => 3,
                "name" => "Network Operation Center",
            ],
            [
                "id" => 4,
                "name" => "Human Resource Officer",
            ],
            [
                "id" => 5,
                "name" => "Senior Accountant Officer",
            ],
        ];
        $jobType = [
            [
                "id" => 1,
                "name" => "Full-Time"
            ],
            [
                "id" => 2,
                "name" => "Part-Time"
            ],
            [
                "id" => 3,
                "name" => "Contract"
            ],
            [
                "id" => 4,
                "name" => "Temporary"
            ],
            [
                "id" => 5,
                "name" => "Casual"
            ],
            [
                "id" => 6,
                "name" => "Seasonal"
            ],
            [
                "id" => 7,
                "name" => "Internship"
            ],
            [
                "id" => 8,
                "name" => "Freelance"
            ],
            [
                "id" => 9,
                "name" => "Consultant"
            ],
            [
                "id" => 10,
                "name" => "Apprentice"
            ],
        ];
        $shiftType = [
            [
                "id" => 1,
                "name" => "[NS] Night Shift"
            ],
            [
                "id" => 2,
                "name" => "[DS] Day Shift"
            ],
            [
                "id" => 3,
                "name" => "[MS] Morning Half Shift"
            ],
            [
                "id" => 4,
                "name" => "[AS] Afternoon Shift"
            ],
            [
                "id" => 5,
                "name" => "[LS] Late Shift"
            ],
            [
                "id" => 6,
                "name" => "[ES] Everning Shift"
            ],
        ];
        $positions = "";
        foreach ($posts as $post) {
            $positions .= "<option value='" . $post["id"] . "'>" . $post["name"] . "</option>";
        }
        return view('pages.career', compact('careers', 'branches', 'positions',"jobType","shiftType"));
    }

    public function careerApply(Request $request)
    {
        $data = $request->validate([
            'career_id'    => ['nullable', 'exists:careers,id'],
            'full_name'    => ['required', 'string', 'max:150'],
            'email'        => ['required', 'email', 'max:150'],
            'phone'        => ['nullable', 'string', 'max:50'],
            'position'     => ['nullable', 'string', 'max:200'],
            'cover_letter' => ['nullable', 'string', 'max:2000'],
            'cv'           => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        $data['cv_path'] = $request->file('cv')->store('career-applications', 'public');
        unset($data['cv']);

        CareerApplication::create($data);

        return back()->with('apply_success', true);
    }
    // app/Http/Controllers/CoverageController.php
    public function data(Request $request)
    {
        $search = $request->input('query'); // explicit accessor, not $request->query

        $zones = Branch::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                    ->orWhere('name_km', 'like', "%{$search}%");
            })
            ->get(['id', 'name_en', 'name_km', 'lat', 'lng', 'status']);

        return response()->json([
            'data'  => $zones,
            'total' => Branch::count(),
        ]);
    }

    public function check(Request $request)
    {
        $zone = Branch::where('name', 'like', "%{$request->keyword}%")->first();

        if (!$zone) {
            return response()->json([
                'name'   => $request->keyword,
                'status' => 'unavailable',
            ]);
        }

        return response()->json([
            'name'   => $zone->name,
            'status' => $zone->status,
            'lat'    => $zone->lat,
            'lng'    => $zone->lng,
        ]);
    }
}
