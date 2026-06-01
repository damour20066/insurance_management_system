<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Policy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PolicyController extends Controller
{
    public function index(): View
    {
        $policies = Policy::with('client')->withCount('claims')->latest()->paginate(10);

        return view('policies.index', compact('policies'));
    }

    public function create(): View
    {
        $clients = Client::pluck('name', 'client_id');

        return view('policies.create', compact('clients'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_id' => ['required', 'exists:clients,client_id'],
            'type' => ['required', 'string', 'max:255'],
            'premium' => ['required', 'numeric', 'min:0'],
        ]);

        Policy::create($validated);

        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    public function show(Policy $policy): View
    {
        $policy->load('client', 'claims');

        return view('policies.show', compact('policy'));
    }

    public function edit(Policy $policy): View
    {
        $clients = Client::pluck('name', 'client_id');

        return view('policies.edit', compact('policy', 'clients'));
    }

    public function update(Request $request, Policy $policy): RedirectResponse
    {
        $validated = $request->validate([
            'client_id' => ['required', 'exists:clients,client_id'],
            'type' => ['required', 'string', 'max:255'],
            'premium' => ['required', 'numeric', 'min:0'],
        ]);

        $policy->update($validated);

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy): RedirectResponse
    {
        $policy->delete();

        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }
}
