<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Status;
use App\Models\Agent;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with(['status', 'agent'])->latest()->get();
        $statuses = Status::all();
        $agents = Agent::all();
        return view('leads.index', compact('leads', 'statuses', 'agents'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'full_name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'time_zone' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
    ]);

    $defaultStatus = Status::firstOrCreate(['name' => 'Intake']);

    $validatedData['status_id'] = $defaultStatus->id;
    $validatedData['source'] = 'Manual Entry'; // You can modify this as needed

    Lead::create($validatedData);

    return redirect()->route('leads.index')->with('success', 'Lead created successfully');
}

public function show(Lead $lead)
{
    return response()->json($lead->load('status', 'agent'));
}

public function update(Request $request, Lead $lead)
{
    $validatedData = $request->validate([
        'status_id' => 'required|exists:statuses,id',
        'reminder_at' => 'nullable|date',
        'note' => 'nullable|string',
    ]);

    $lead->update($validatedData);

    return response()->json(['message' => 'Lead updated successfully']);
}

    // You can add other methods like edit, create, destroy if needed
}