<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('sort_order')->get();
        $portfolio = PortfolioItem::orderBy('sort_order')->get();
        $categories = Category::orderBy('sort_order')->get();

        $settings = [
            'company_name' => SiteSetting::get('company_name', 'AGM Always Good Making'),
            'contact_person' => SiteSetting::get('contact_person', 'Nasir Multani'),
            'phone' => SiteSetting::get('phone', '9977350503'),
            'whatsapp_phone' => SiteSetting::get('whatsapp_phone', '919977350503'),
            'email' => SiteSetting::get('email', 'info@agmalwaysgoodmaking.in'),
            'gstin' => SiteSetting::get('gstin', '23BQAPM4037J1Z1'),
            'address' => SiteSetting::get('address', '51 Dawoody Nagar, Khajrana, Indore, Madhya Pradesh'),
            'workshop_address' => SiteSetting::get('workshop_address', 'Shop No. C-1, Radha Kunj Colony, Near Ring Road, Khajrana, Indore'),
            'working_hours' => SiteSetting::get('working_hours', '9:30 AM - 8:00 PM (All 7 Days Open)'),
            'rating' => SiteSetting::get('rating', '4.2'),
            'review_count' => SiteSetting::get('review_count', '58'),
            'years_experience' => SiteSetting::get('years_experience', '12+'),
        ];

        return view('pages.home', compact('services', 'portfolio', 'settings', 'categories'));
    }

    public function service(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $otherServices = Service::where('id', '!=', $service->id)->take(4)->get();
        $relatedPortfolio = PortfolioItem::where('category', $service->category)
            ->take(6)
            ->get();

        $settings = [
            'company_name' => SiteSetting::get('company_name', 'AGM Always Good Making'),
            'contact_person' => SiteSetting::get('contact_person', 'Nasir Multani'),
            'phone' => SiteSetting::get('phone', '9977350503'),
            'whatsapp_phone' => SiteSetting::get('whatsapp_phone', '919977350503'),
            'gstin' => SiteSetting::get('gstin', '23BQAPM4037J1Z1'),
        ];

        return view('pages.service', compact('service', 'otherServices', 'relatedPortfolio', 'settings'));
    }
}
