<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'InsurePro') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gradient-to-br from-blue-50 via-white to-amber-50 min-h-screen">
        <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
            <div class="w-full max-w-sm">
                <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 mb-8" wire:navigate>
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-700 text-white font-bold text-lg">IM</div>
                    <span class="text-2xl font-semibold text-gray-900">InsurePro</span>
                </a>
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
