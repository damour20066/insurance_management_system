<x-layouts.app>
    <div class="p-6 max-w-2xl">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('policies.index') }}" class="text-gray-400 hover:text-gray-600">&larr; Back</a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Policy</h1>
        </div>

        <form method="POST" action="{{ route('policies.update', $policy) }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1.5">Client</label>
                <select name="client_id" id="client_id" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                    @foreach ($clients as $id => $name)
                        <option value="{{ $id }}" {{ old('client_id', $policy->client_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('client_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1.5">Type</label>
                <input type="text" name="type" id="type" value="{{ old('type', $policy->type) }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="premium" class="block text-sm font-medium text-gray-700 mb-1.5">Premium ($)</label>
                <input type="number" step="0.01" min="0" name="premium" id="premium" value="{{ old('premium', $policy->premium) }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('premium') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">Update</button>
                <a href="{{ route('policies.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.app>
