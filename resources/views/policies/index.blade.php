<x-layouts.app>
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Policies</h1>
            <a href="{{ route('policies.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">+ Add Policy</a>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Type</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Premium</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Claims</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($policies as $policy)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $policy->policy_id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $policy->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $policy->type }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 text-right">${{ number_format($policy->premium, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">{{ $policy->claims_count }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('policies.show', $policy) }}" class="text-blue-700 hover:text-blue-900">View</a>
                                <a href="{{ route('policies.edit', $policy) }}" class="text-amber-600 hover:text-amber-800">Edit</a>
                                <form method="POST" action="{{ route('policies.destroy', $policy) }}" class="inline" onsubmit="return confirm('Delete this policy?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">No policies found. <a href="{{ route('policies.create') }}" class="text-blue-700 font-medium">Add one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
            @if ($policies->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">{{ $policies->links() }}</div>
            @endif
        </div>
    </div>
</x-layouts.app>
