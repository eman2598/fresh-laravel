@extends('layouts.auth')

@section('content')
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
<div class="container mt-5">
    <h3 class="text-center" style="color: rgb(0, 27, 58); font-weight: bold;">Transaction History</h3>

    <table class="table table-hover table-striped shadow-lg rounded">
        <thead class="bg-dark text-white">
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Amount Paid</th>
                <th>Points Earned</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->created_at->format('d M Y, h:i A') }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>${{ number_format($transaction->amount_paid, 2) }}</td>
                <td>{{ $transaction->points_given }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

<style>
    .table {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: center;
        font-size: 14px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .table th {
        background-color: rgb(0, 27, 58);
        color: white;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f8f8f8;
    }

    .table-hover tbody tr:hover {
        background-color: #e2f0f9;
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border-color: #dee2e6;
    }

    .table tbody tr td {
        color: #333;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table-striped tbody tr:nth-child(even) {
        background-color: #ffffff;
    }
</style>