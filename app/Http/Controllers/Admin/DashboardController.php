<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lead;
use App\Models\PortfolioItem;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_leads' => Lead::count(),
            'new_leads' => Lead::where('status', 'new')->count(),
            'total_portfolio' => PortfolioItem::count(),
            'total_services' => Service::count(),
            'total_categories' => Category::count(),
        ];

        $recentLeads = Lead::latest()->take(6)->get();
        $recentPortfolio = PortfolioItem::latest()->take(6)->get();
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.dashboard', compact('stats', 'recentLeads', 'recentPortfolio', 'categories'));
    }
}
