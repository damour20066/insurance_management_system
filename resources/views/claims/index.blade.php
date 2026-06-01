<x-layouts.app>
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Claims</h1>
            <a href="{{ route('claims.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">+ Add Claim</a>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Policy</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Client</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($claims as $claim)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $claim->claim_id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $claim->policy_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $claim->policy->client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 text-right">${{ number_format($claim->amount, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $claim->date->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('claims.show', $claim) }}" class="text-blue-700 hover:text-blue-900">View</a>
                                <a href="{{ route('claims.edit', $claim) }}" class="text-amber-600 hover:text-amber-800">Edit</a>
                                <form method="POST" action="{{ route('claims.destroy', $claim) }}" class="inline" onsubmit="return confirm('Delete this claim?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">No claims found. <a href="{{ route('claims.create') }}" class="text-blue-700 font-medium">Add one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
            @if ($claims->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">{{ $claims->links() }}</div>
            @endif
        </div>
    </div>
</x-layouts.app>
