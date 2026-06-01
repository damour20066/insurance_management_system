<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Dashboard</h1>
        <p class="text-sm text-gray-500 mb-6">Welcome back, {{ auth()->user()->username }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Clients</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Client::count() }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                </div>
                <a href="{{ route('clients.index') }}" class="inline-block mt-4 text-sm font-medium text-blue-700 hover:text-blue-800">View all &rarr;</a>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Policies</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Policy::count() }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-amber-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                </div>
                <a href="{{ route('policies.index') }}" class="inline-block mt-4 text-sm font-medium text-blue-700 hover:text-blue-800">View all &rarr;</a>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Claims</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ \App\Models\Claim::count() }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                </div>
                <a href="{{ route('claims.index') }}" class="inline-block mt-4 text-sm font-medium text-blue-700 hover:text-blue-800">View all &rarr;</a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Clients</h2>
                @php $recentClients = \App\Models\Client::latest()->take(5)->get(); @endphp
                @if ($recentClients->count())
                    <div class="space-y-3">
                        @foreach ($recentClients as $client)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $client->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $client->phone }}</p>
                                </div>
                                <a href="{{ route('clients.show', $client) }}" class="text-sm text-blue-700 hover:text-blue-900">View</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No clients yet.</p>
                @endif
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Claims</h2>
                @php $recentClaims = \App\Models\Claim::with('policy.client')->latest()->take(5)->get(); @endphp
                @if ($recentClaims->count())
                    <div class="space-y-3">
                        @foreach ($recentClaims as $claim)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${{ number_format($claim->amount, 2) }}</p>
                                    <p class="text-xs text-gray-500">{{ $claim->policy->client->name }} &middot; {{ $claim->date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('claims.show', $claim) }}" class="text-sm text-blue-700 hover:text-blue-900">View</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No claims yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
