<x-layouts.app>
    <div class="p-6 max-w-3xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <a href="{{ route('policies.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Policies</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">Policy #{{ $policy->policy_id }}</h1>
            </div>
            <a href="{{ route('policies.edit', $policy) }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">Edit</a>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Policy Details</h2>
                <dl class="space-y-3">
                    <div class="flex justify-between"><dt class="text-sm text-gray-500">Client</dt><dd class="text-sm font-medium text-gray-900">{{ $policy->client->name }}</dd></div>
                    <div class="flex justify-between"><dt class="text-sm text-gray-500">Type</dt><dd class="text-sm font-medium text-gray-900">{{ $policy->type }}</dd></div>
                    <div class="flex justify-between"><dt class="text-sm text-gray-500">Premium</dt><dd class="text-sm font-medium text-gray-900">${{ number_format($policy->premium, 2) }}</dd></div>
                </dl>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Claims Summary</h2>
                <dl class="space-y-3">
                    <div class="flex justify-between"><dt class="text-sm text-gray-500">Total Claims</dt><dd class="text-sm font-medium text-gray-900">{{ $policy->claims->count() }}</dd></div>
                    <div class="flex justify-between"><dt class="text-sm text-gray-500">Total Amount</dt><dd class="text-sm font-medium text-gray-900">${{ number_format($policy->claims->sum('amount'), 2) }}</dd></div>
                </dl>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Claims</h2>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($policy->claims as $claim)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $claim->claim_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 text-right">${{ number_format($claim->amount, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $claim->date->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="px-6 py-8 text-center text-sm text-gray-500">No claims for this policy.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
