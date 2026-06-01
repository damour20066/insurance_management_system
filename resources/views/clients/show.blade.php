<x-layouts.app>
    <div class="p-6 max-w-3xl">
        <div class="flex items-center justify-between mb-6">
            <div>
                <a href="{{ route('clients.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Clients</a>
                <h1 class="text-2xl font-bold text-gray-900 mt-1">{{ $client->name }}</h1>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('clients.edit', $client) }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">Edit</a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Client Details</h2>
            <dl class="grid grid-cols-2 gap-4">
                <div><dt class="text-sm text-gray-500">Phone</dt><dd class="text-sm font-medium text-gray-900">{{ $client->phone }}</dd></div>
                <div><dt class="text-sm text-gray-500">Total Policies</dt><dd class="text-sm font-medium text-gray-900">{{ $client->policies->count() }}</dd></div>
            </dl>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Policies</h2>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Premium</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Claims</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($client->policies as $policy)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $policy->policy_id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $policy->type }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 text-right">${{ number_format($policy->premium, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">{{ $policy->claims->count() }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">No policies for this client.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
