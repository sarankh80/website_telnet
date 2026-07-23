<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — TELNET</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-100 flex items-center justify-center p-4" style="font-family:'Inter',sans-serif">

<div class="w-full max-w-sm">
    {{-- Logo --}}
    <div class="text-center mb-8">
        <svg class="h-12 w-auto mx-auto mb-4" viewBox="0 0 380 90" fill="none">
            <circle cx="45" cy="45" r="42" fill="#8DC63F"/>
            <path d="M 12 70 C 15 38 42 16 80 14 C 70 17 56 28 46 50 C 36 68 20 76 12 70 Z" fill="#F58220"/>
            <path d="M 22 78 C 25 48 52 26 88 22 C 77 26 63 38 53 60 C 43 78 28 82 22 78 Z" fill="#F58220"/>
            <text x="100" y="62" font-family="Inter" font-weight="900" font-size="52" fill="#8DC63F">TEL</text>
            <text x="215" y="62" font-family="Inter" font-weight="900" font-size="52" fill="#F58220">NET</text>
        </svg>
        <p class="text-sm text-slate-400">Admin Panel</p>
    </div>

    {{-- Card --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8">
        <h2 class="text-xl font-bold text-slate-100 mb-6">Sign In</h2>

        @if($errors->any())
            <div class="mb-5 px-4 py-3 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-3 text-sm
                              focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition
                              placeholder-slate-500"
                       placeholder="admin@telnet.com.kh">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-3 text-sm
                              focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition
                              placeholder-slate-500"
                       placeholder="••••••••">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember"
                       class="rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                <label for="remember" class="text-sm text-slate-400">Remember me</label>
            </div>

            <button type="submit"
                    class="w-full py-3 bg-brand-green hover:bg-[#7ab534] text-white font-semibold rounded-lg text-sm transition">
                Sign In
            </button>
        </form>
    </div>

    <p class="text-center text-xs text-slate-600 mt-6">
        <a href="{{ route('home') }}" class="hover:text-slate-400 transition">← Back to website</a>
    </p>
</div>

</body>
</html>
