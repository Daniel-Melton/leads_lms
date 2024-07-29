@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statuses</h1>
    <form action="{{ route('statuses.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="name" class="form-control" placeholder="Status Name" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Status</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $status->name }}</td>
                <td>{{ $status->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection