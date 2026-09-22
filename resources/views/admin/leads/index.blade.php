@extends('admin.layout')

@section('title', 'Customer Inquiries & Leads')

@section('content')
<div class="space-y-6">

    <!-- Header & Filter Tabs -->
    <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-200 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-extrabold text-slate-900">Customer Inquiries Inbox</h1>
            <p class="text-xs text-slate-500 mt-0.5">Direct callback requests and free site measurement bookings from the website.</p>
        </div>

        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 -mx-1 px-1 sm:overflow-visible sm:pb-0 text-xs shrink-0">
            <a href="{{ route('admin.leads.index') }}" 
               class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ !request('status') ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'new']) }}" 
               class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request('status') === 'new' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-amber-50 text-amber-800 hover:bg-amber-100 font-bold' }}">
                New ({{ $counts['new'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'contacted']) }}" 
               class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request('status') === 'contacted' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Contacted ({{ $counts['contacted'] }})
            </a>
            <a href="{{ route('admin.leads.index', ['status' => 'closed']) }}" 
               class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request('status') === 'closed' ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Closed ({{ $counts['closed'] }})
            </a>
        </div>
    </div>

    <!-- Mobile View: Touch-Friendly Lead Cards (Visible on screens < 768px) -->
    <div class="md:hidden space-y-3.5">
        @forelse($leads as $lead)
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <strong class="text-sm font-extrabold text-slate-900 block">{{ $lead->name }}</strong>
                        <a href="tel:{{ $lead->clean_phone }}" class="text-xs font-semibold text-amber-600 block mt-0.5">
                            📞 {{ $lead->phone }}
                        </a>
                    </div>
                    <form action="{{ route('admin.leads.status', $lead) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" 
                                class="text-[11px] font-bold py-1 px-2 rounded-lg border border-slate-300 {{ $lead->status === 'new' ? 'bg-amber-50 text-amber-800 border-amber-300' : ($lead->status === 'contacted' ? 'bg-blue-50 text-blue-800' : 'bg-slate-100 text-slate-600') }} outline-none cursor-pointer">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>NEW</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>CONTACTED</option>
                            <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>CLOSED</option>
                        </select>
                    </form>
                </div>

                <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100 text-xs space-y-1">
                    <div class="flex items-center justify-between text-[11px]">
                        <span class="font-bold text-slate-800">{{ $lead->service_type ?: 'General Inquiry' }}</span>
                        <span class="text-slate-500">{{ $lead->location ?: 'Indore' }}</span>
                    </div>
                    @if($lead->message)
                        <p class="text-slate-600 text-[11px] italic pt-1 border-t border-slate-200">
                            "{{ $lead->message }}"
                        </p>
                    @endif
                </div>

                <div class="flex items-center justify-between gap-2 pt-1">
                    <span class="text-[10px] text-slate-400">
                        {{ $lead->created_at->diffForHumans() }}
                    </span>

                    <div class="flex items-center gap-2">
                        <a href="{{ $lead->whatsapp_url }}" target="_blank" rel="noopener" 
                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-emerald-600 text-white font-bold text-xs shadow-xs active:scale-95">
                            <span>WhatsApp</span>
                        </a>

                        <a href="tel:{{ $lead->clean_phone }}" 
                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-slate-900 text-white font-bold text-xs active:scale-95">
                            <span>Call</span>
                        </a>

                        <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Delete this lead?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-slate-400 hover:text-red-600 cursor-pointer text-sm font-bold">
                                &times;
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center text-xs text-slate-400">
                No customer inquiries found.
            </div>
        @endforelse
    </div>

    <!-- Desktop View: Table (Visible on screens >= 768px) -->
    <div class="hidden md:block bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 text-slate-800 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="p-4">Customer Details</th>
                        <th class="p-4">Service & Location</th>
                        <th class="p-4">Message / Notes</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Received</th>
                        <th class="p-4 text-right">Quick Contact Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4">
                                <strong class="text-sm font-bold text-slate-900 block">{{ $lead->name }}</strong>
                                <a href="tel:{{ $lead->clean_phone }}" class="text-xs font-semibold text-slate-600 hover:text-amber-600">
                                    {{ $lead->phone }}
                                </a>
                            </td>

                            <td class="p-4">
                                <span class="font-bold text-slate-800 block">{{ $lead->service_type ?: 'General Inquiry' }}</span>
                                <span class="text-slate-500 text-[11px]">{{ $lead->location ?: 'Indore' }}</span>
                            </td>

                            <td class="p-4 max-w-xs">
                                <p class="text-slate-600 text-xs line-clamp-2">{{ $lead->message ?: 'No message provided' }}</p>
                            </td>

                            <td class="p-4">
                                <form action="{{ route('admin.leads.status', $lead) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" 
                                            class="text-[11px] font-bold py-1 px-2 rounded-md border border-slate-300 {{ $lead->status === 'new' ? 'bg-amber-50 text-amber-800 border-amber-300' : ($lead->status === 'contacted' ? 'bg-blue-50 text-blue-800' : 'bg-slate-100 text-slate-600') }} outline-none cursor-pointer">
                                        <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>NEW</option>
                                        <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>CONTACTED</option>
                                        <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>CLOSED</option>
                                    </select>
                                </form>
                            </td>

                            <td class="p-4 text-slate-400 whitespace-nowrap">
                                {{ $lead->created_at->diffForHumans() }}
                            </td>

                            <td class="p-4 text-right space-x-1.5 whitespace-nowrap">
                                <!-- 1-Click WhatsApp -->
                                <a href="{{ $lead->whatsapp_url }}" target="_blank" rel="noopener" 
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-colors shadow-xs">
                                    <span>WhatsApp</span>
                                </a>

                                <!-- 1-Click Phone Call -->
                                <a href="tel:{{ $lead->clean_phone }}" 
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors">
                                    <span>Call</span>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="inline" onsubmit="return confirm('Delete this lead?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-400 hover:text-red-600 cursor-pointer" title="Delete Lead">
                                        &times;
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-xs text-slate-400">
                                No inquiries found in this view.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($leads->hasPages())
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs">
            {{ $leads->links() }}
        </div>
    @endif

</div>
@endsection
