<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index(): View
    {
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
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'company_name',
            'contact_person',
            'phone',
            'whatsapp_phone',
            'email',
            'gstin',
            'address',
            'workshop_address',
            'working_hours',
            'rating',
            'review_count',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field));
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'Admin login profile updated successfully.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Admin password updated successfully.');
    }
}
