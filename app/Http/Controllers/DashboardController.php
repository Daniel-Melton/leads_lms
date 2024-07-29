<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Agent;
use App\Models\Status;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $totalAgents = Agent::count();
        $totalStatuses = Status::count();

        return view('dashboard', compact('totalLeads', 'totalAgents', 'totalStatuses'));
    }
}