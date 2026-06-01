<x-layouts.app>
    <div class="p-6 max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Add Claim</h1>

        <form method="POST" action="{{ route('claims.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">
            @csrf
            <div>
                <label for="policy_id" class="block text-sm font-medium text-gray-700 mb-1.5">Policy</label>
                <select name="policy_id" id="policy_id" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                    <option value="">Select a policy</option>
                    @foreach ($policies as $id => $label)
                        <option value="{{ $id }}" {{ old('policy_id') == $id ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('policy_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1.5">Amount ($)</label>
                <input type="number" step="0.01" min="0" name="amount" id="amount" value="{{ old('amount') }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('amount') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1.5">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none">
                @error('date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-colors">Save</button>
                <a href="{{ route('claims.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.app>
