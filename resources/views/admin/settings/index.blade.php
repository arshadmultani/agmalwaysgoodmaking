@extends('admin.layout')

@section('title', 'Website Settings & Business Profile')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-5 sm:p-8 rounded-2xl border border-slate-200 shadow-xs">
    
    <div class="mb-5 pb-3 border-b border-slate-100">
        <h1 class="text-lg font-black text-slate-900">Business Profile & Site Settings</h1>
        <p class="text-xs text-slate-500 mt-0.5">Update contact details, GSTIN, and workshop addresses displayed across the site.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4 sm:space-y-5">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Company Name</label>
                <input type="text" name="company_name" value="{{ old('company_name', $settings['company_name']) }}" required 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Contact Person Name</label>
                <input type="text" name="contact_person" value="{{ old('contact_person', $settings['contact_person']) }}" required 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Primary Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $settings['phone']) }}" required 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">WhatsApp Number (e.g. 919977350503)</label>
                <input type="text" name="whatsapp_phone" value="{{ old('whatsapp_phone', $settings['whatsapp_phone']) }}" required 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">GSTIN Number</label>
                <input type="text" name="gstin" value="{{ old('gstin', $settings['gstin']) }}" required 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Contact Email</label>
                <input type="email" name="email" value="{{ old('email', $settings['email']) }}" 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Registered Address</label>
            <input type="text" name="address" value="{{ old('address', $settings['address']) }}" required 
                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Workshop / Service Facility Address</label>
            <input type="text" name="workshop_address" value="{{ old('workshop_address', $settings['workshop_address']) }}" 
                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Operating Hours</label>
            <input type="text" name="working_hours" value="{{ old('working_hours', $settings['working_hours']) }}" 
                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 sm:py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                Save Business Settings
            </button>
        </div>

    </form>

</div>

<!-- Admin Account & Security Section -->
<div class="max-w-3xl mx-auto mt-8 space-y-6">

    <!-- Card 1: Change Admin Password -->
    <div class="bg-white p-5 sm:p-8 rounded-2xl border border-slate-200 shadow-xs">
        <div class="mb-5 pb-3 border-b border-slate-100 flex items-center justify-between gap-2">
            <div>
                <h2 class="text-lg font-black text-slate-900 flex items-center gap-2">
                    <span>🔒</span> Change Admin Password
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    Your password is encrypted using Bcrypt and stored safely in the database.
                </p>
            </div>
            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                DB Protected
            </span>
        </div>

        <form action="{{ route('admin.settings.password') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Current Password *</label>
                <input type="password" name="current_password" required placeholder="Enter your current password" 
                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">New Password (Min 8 chars) *</label>
                    <input type="password" name="password" required minlength="8" placeholder="Enter new strong password" 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Confirm New Password *</label>
                    <input type="password" name="password_confirmation" required minlength="8" placeholder="Repeat new password" 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-end">
                <button type="submit" class="w-full sm:w-auto px-6 py-3 sm:py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                    Update Password
                </button>
            </div>
        </form>
    </div>

    <!-- Card 2: Update Admin Login Email / Name -->
    <div class="bg-white p-5 sm:p-8 rounded-2xl border border-slate-200 shadow-xs">
        <div class="mb-5 pb-3 border-b border-slate-100">
            <h2 class="text-lg font-black text-slate-900 flex items-center gap-2">
                <span>👤</span> Admin Login Profile
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Update the name and email address you use to sign in to this admin dashboard.
            </p>
        </div>

        <form action="{{ route('admin.settings.profile') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Admin Display Name *</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Login Email Address *</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-end">
                <button type="submit" class="w-full sm:w-auto px-6 py-3 sm:py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                    Update Login Email
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
