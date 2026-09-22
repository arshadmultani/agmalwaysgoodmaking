<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'service_type' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $lead = Lead::create($validated);

        // Pre-fill WhatsApp message to Nasir Multani
        $serviceName = $lead->service_type ?: 'Interior Consultation';
        $location = $lead->location ? " from {$lead->location}" : '';
        $text = rawurlencode("Hello Nasir ji, I submitted an inquiry for {$serviceName}{$location} on your AGM website.\n\nName: {$lead->name}\nPhone: {$lead->phone}".($lead->message ? "\nNote: {$lead->message}" : ''));

        $whatsappUrl = "https://wa.me/919977350503?text={$text}";

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Nasir Multani will contact you shortly.',
                'whatsapp_url' => $whatsappUrl,
            ]);
        }

        return redirect()->back()
            ->with('success', 'Thank you! Your inquiry has been received. Nasir Multani will call you shortly.')
            ->with('whatsapp_redirect', $whatsappUrl);
    }
}
