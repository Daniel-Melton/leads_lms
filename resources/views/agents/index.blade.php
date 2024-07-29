@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agents</h1>
    <form action="{{ route('agents.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Agent Name" required>
            </div>
            <div class="col-md-4">
                <input type="email" name="email" class="form-control" placeholder="Agent Email" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Agent</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agents as $agent)
            <tr>
                <td>{{ $agent->name }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ $agent->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection