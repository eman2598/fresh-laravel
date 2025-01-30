@extends('layouts.auth')

@section('content')
<h3>Edit Customer</h3>
<div class="container mt-2">
    @if(session('success_msg'))
    <div class="alert alert-success" role="alert">
        <strong>Good Job!</strong> {{ session('success_msg') }}
    </div>
    @endif
    @if(session('error_msg'))
    <div class="alert alert-danger" role="alert">
        {{ session('error_msg') }}
    </div>
    @endif
</div>

<form method="POST" action="{{ route('admin.customers.update', $customer) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update Customer</button>
</form>
@endsection