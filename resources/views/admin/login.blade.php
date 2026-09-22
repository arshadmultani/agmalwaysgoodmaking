<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | AGM Always Good Making</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-slate-800 border border-slate-700 rounded-2xl p-6 sm:p-8 shadow-2xl">
        
        <div class="text-center mb-6">
            <div class="w-12 h-12 rounded-xl bg-amber-500 text-slate-950 font-black text-2xl flex items-center justify-center mx-auto mb-3">
                AGM
            </div>
            <h1 class="text-xl font-extrabold text-white">Admin Portal</h1>
            <p class="text-xs text-slate-400 mt-1">AGM Always Good Making Management</p>
        </div>

        @if(session('status'))
            <div class="mb-4 p-3 rounded-lg bg-slate-700 text-xs text-amber-400">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-red-950/80 border border-red-800 text-xs text-red-300">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@agmalwaysgoodmaking.in') }}" required autofocus
                       class="w-full px-3.5 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-sm text-white focus:border-amber-500 outline-none transition-colors">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full px-3.5 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-sm text-white focus:border-amber-500 outline-none transition-colors">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 text-slate-400 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-slate-900 border-slate-700 text-amber-500 focus:ring-0">
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-sm tracking-wide transition-all shadow-md cursor-pointer">
                Sign In to Dashboard
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-500 border-t border-slate-700/60 pt-4">
            <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">&larr; Back to Website</a>
        </div>

    </div>

</body>
</html>
