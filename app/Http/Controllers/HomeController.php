<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Service;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $services    = Service::active()->take(6)->get();
        $branches    = Branch::active()->get();
        $teamMembers = Team::active()->get();
        $ceo         = Team::active()->ceo()->first();

        return view('pages.home.index', compact('services', 'branches', 'teamMembers', 'ceo'));
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

    public function portal()
    {
        return view('pages.portal');
    }
    public function career()
    {
        return view('pages.career');
    }
}
