<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = Lead::query();

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $leads = $query->latest()->paginate(20);
        $counts = [
            'all' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'contacted' => Lead::where('status', 'contacted')->count(),
            'closed' => Lead::where('status', 'closed')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'counts'));
    }

    public function updateStatus(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,closed'],
        ]);

        $lead->update($validated);

        return redirect()->back()->with('success', "Lead marked as {$lead->status}.");
    }

    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()->back()->with('success', 'Lead removed.');
    }
}
