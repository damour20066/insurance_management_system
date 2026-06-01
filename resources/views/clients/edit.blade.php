<x-layouts.app>
    <div class="p-6 max-w-2xl">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('clients.index') }}" class="text-gray-400 hover:text-gray-600">&larr; Back</a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Client</h1>
        </div>

        <form method="POST" action="{{ route('clients.update', $client) }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">Update</button>
                <a href="{{ route('clients.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.app>
