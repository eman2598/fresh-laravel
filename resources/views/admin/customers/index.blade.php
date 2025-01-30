@extends('layouts.auth')

@section('content')
<h3 class="text-custom">All Customers</h3>
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

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <form action="{{ route('admin.customers.delete', $customer) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger-custom">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@push('styles')
<style>
    .table {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 27, 58, 0.2);
        margin-top: 20px;
        padding: 15px;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
    }

    .table th {
        background-color: rgb(0, 27, 58);
        color: white;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f7f7f7;
    }

    .btn-danger-custom {
        background-color: rgb(0, 27, 58);
        border-color: rgb(0, 27, 58);
        color: white;
        font-weight: 600;
        padding: 8px 15px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-danger-custom:hover {
        background-color: white;
        color: rgb(0, 27, 58);
        border-color: rgb(0, 27, 58);
    }

    .btn-danger-custom i {
        margin-right: 5px;
    }

    .text-custom {
        color: rgb(0, 27, 58);
        font-weight: 700;
    }

    .alert-success {
        background-color: rgb(0, 27, 58);
        color: white;
    }

    .alert-danger {
        background-color: #e83e8c;
        color: white;
    }
</style>
@endpush