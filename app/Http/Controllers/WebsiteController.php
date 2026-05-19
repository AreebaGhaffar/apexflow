<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Lead;

class WebsiteController extends Controller
{
    private function settings()
    {
        return SiteSetting::pluck('value', 'key')->toArray();
    }

    public function home()
    {
        $services = Service::where('active', true)->take(6)->get();
        $settings = $this->settings();
        return view('website.home', compact('services', 'settings'));
    }

    public function services()
    {
        $services = Service::where('active', true)->get();
        $settings = $this->settings();
        return view('website.services', compact('services', 'settings'));
    }

    public function about()
    {
        $settings = $this->settings();
        return view('website.about', compact('settings'));
    }

    public function contact()
    {
        $services = Service::where('active', true)->get();
        $settings = $this->settings();
        return view('website.contact', compact('services', 'settings'));
    }

    public function submitLead(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'required|string|max:20',
            'email'   => 'nullable|email',
            'service' => 'nullable|string',
            'message' => 'nullable|string|max:1000',
        ]);

        Lead::create($request->only(['name', 'phone', 'email', 'service', 'message']));

        return back()->with('success', 'Thank you! We will contact you soon.');
    }
}