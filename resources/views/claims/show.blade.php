<x-layouts.app>
    <div class="p-6 max-w-3xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <a href="{{ route('claims.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Claims</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">Claim #{{ $claim->claim_id }}</h1>
            </div>
            <a href="{{ route('claims.edit', $claim) }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">Edit</a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Claim Details</h2>
            <dl class="grid grid-cols-2 gap-4">
                <div><dt class="text-sm text-gray-500">Policy</dt><dd class="text-sm font-medium text-gray-900">#{{ $claim->policy_id }}</dd></div>
                <div><dt class="text-sm text-gray-500">Client</dt><dd class="text-sm font-medium text-gray-900">{{ $claim->policy->client->name }}</dd></div>
                <div><dt class="text-sm text-gray-500">Amount</dt><dd class="text-sm font-medium text-gray-900">${{ number_format($claim->amount, 2) }}</dd></div>
                <div><dt class="text-sm text-gray-500">Date</dt><dd class="text-sm font-medium text-gray-900">{{ $claim->date->format('M d, Y') }}</dd></div>
            </dl>
        </div>
    </div>
</x-layouts.app>
