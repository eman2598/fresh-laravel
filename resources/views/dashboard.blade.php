@extends('layouts.auth')

@section('content')
<style>
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }

    .card-body {
        padding: 30px 20px;
    }

    .card-footer {
        font-size: 13px;
    }
</style>

<div class="col-9">
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

    @if(auth()->user()->role == 'user')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title ">Total Points</h5>
                    <h3 class="mb-0 text-dark">{{ $totalPoints }}</h3>
                    <i class="bi bi-trophy fs-1 "></i>
                </div>
                <div class="card-footer text-white text-center" style="background-color:rgb(0, 27, 58);">
                    Keep up the great work!
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title ">Your Rank</h5>
                    <h3 class="mb-0 text-dark">{{ $rank }}</h3>
                    <p class="text-muted">You're doing great! Keep earning points!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Points History -->
    <div class="row mt-5">
        <div class="col-12 mt-4">
            <h3 class="mb-3" style="color:rgb(2, 33, 53); font-weight: bold;">Transaction History</h3>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th>Date</th>
                            <th>Amount Paid</th>
                            <th>Points Earned</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->created_at->format('d M Y, h:i A') }}</td>
                            <td>${{ number_format($transaction->amount_paid, 2) }}</td>
                            <td>{{ $transaction->points_given }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Available Rewards -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="">Available Rewards</h3>
            <div class="row">
                @foreach($rewards as $reward)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 text-white" style="background-color:rgb(0, 27, 58); height:250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $reward->name }}</h5>
                            <p>{{ $reward->description }}</p>
                            <h5 class="mb-0">{{ $reward->points_required }} Points</h5>
                            <form method="POST" action="{{ route('user.redeem') }}">
                                @csrf
                                <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                                <button type="submit" class="btn btn-light mt-3" style="color: rgb(0, 27 ,58);">
                                    Redeem Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Customers</h5>
                    <h3 class="mb-0 text-dark">{{ $totalCustomers }}</h3>
                    <i class="bi bi-person-fill fs-1"></i>
                </div>
                <div class="card-footer text-white text-center" style="background-color:rgb(0, 27, 58);">
                    Great Reach!
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Earned Points</h5>
                    <h3 class="mb-0 text-dark">{{ $totalEarnedPoints }}</h3>
                    <i class="bi bi-bar-chart-fill fs-1"></i>
                </div>
                <div class="card-footer text-white text-center" style="background-color:rgb(0, 27, 58);">
                    Keep it Growing!
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title"> All Redeemed Points</h5>
                    <h3 class="mb-0 text-dark">{{ $totalRedeemedPoints }}</h3>
                    <i class="bi bi-gift-fill fs-1"></i>
                </div>
                <div class="card-footer text-white text-center" style="background-color:rgb(0, 27, 58);">
                    Customers Redeeming!
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-lg border-0" style="background-color: #ffffff; height: 200px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Purchased Points</h5>
                    <h3 class="mb-0 text-dark">{{ $totalPurchasedPoints }}</h3>
                    <i class="bi bi-wallet2 fs-1"></i>
                </div>
                <div class="card-footer text-white text-center" style="background-color:rgb(0, 27, 58);">
                    Customers Investing!
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
@endsection