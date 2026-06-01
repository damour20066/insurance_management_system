<x-layouts.app>
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Clients</h1>
            <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">+ Add Client</a>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Phone</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Policies</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($clients as $client)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">#{{ $client->client_id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $client->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $client->phone }}</td>
                            <td class="px-6 py-4 text-sm text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $client->policies_count }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('clients.show', $client) }}" class="text-blue-700 hover:text-blue-900">View</a>
                                <a href="{{ route('clients.edit', $client) }}" class="text-amber-600 hover:text-amber-800">Edit</a>
                                <form method="POST" action="{{ route('clients.destroy', $client) }}" class="inline" onsubmit="return confirm('Delete this client?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">No clients found. <a href="{{ route('clients.create') }}" class="text-blue-700 font-medium">Add one</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($clients->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">{{ $clients->links() }}</div>
            @endif
        </div>
    </div>
</x-layouts.app>
