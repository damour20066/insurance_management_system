<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Policy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClaimController extends Controller
{
    public function index(): View
    {
        $claims = Claim::with('policy.client')->latest()->paginate(10);

        return view('claims.index', compact('claims'));
    }

    public function create(): View
    {
        $policies = Policy::with('client')->get()->mapWithKeys(fn ($policy) => [
            $policy->policy_id => "#{$policy->policy_id} - {$policy->client->name} ({$policy->type})",
        ]);

        return view('claims.create', compact('policies'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'policy_id' => ['required', 'exists:policies,policy_id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'date' => ['required', 'date'],
        ]);

        Claim::create($validated);

        return redirect()->route('claims.index')->with('success', 'Claim created successfully.');
    }

    public function show(Claim $claim): View
    {
        $claim->load('policy.client');

        return view('claims.show', compact('claim'));
    }

    public function edit(Claim $claim): View
    {
        $policies = Policy::with('client')->get()->mapWithKeys(fn ($policy) => [
            $policy->policy_id => "#{$policy->policy_id} - {$policy->client->name} ({$policy->type})",
        ]);

        return view('claims.edit', compact('claim', 'policies'));
    }

    public function update(Request $request, Claim $claim): RedirectResponse
    {
        $validated = $request->validate([
            'policy_id' => ['required', 'exists:policies,policy_id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'date' => ['required', 'date'],
        ]);

        $claim->update($validated);

        return redirect()->route('claims.index')->with('success', 'Claim updated successfully.');
    }

    public function destroy(Claim $claim): RedirectResponse
    {
        $claim->delete();

        return redirect()->route('claims.index')->with('success', 'Claim deleted successfully.');
    }
}
