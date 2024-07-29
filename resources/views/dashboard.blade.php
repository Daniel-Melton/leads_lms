@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Leads</h5>
                    <p class="card-text">{{ $totalLeads }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Agents</h5>
                    <p class="card-text">{{ $totalAgents }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Statuses</h5>
                    <p class="card-text">{{ $totalStatuses }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection