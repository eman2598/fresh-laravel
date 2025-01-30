@extends('layouts.auth')

@section('content')
<div class="col-9">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-8 col-lg-6">

                <h2 class="custom-heading text-center">You can enter Points for user through User ID</h2>

                <div class="card border-0 rounded shadow-lg p-4" style="background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(15px); border-radius: 20px;">

                    <div class="card-header text-center" style="background: linear-gradient(135deg, #012855, #0052a5); color: white; border-radius: 15px 15px 0 0;">
                        <h4 class="mb-0">Add Points</h4>
                    </div>

                    <div class="container mt-2">
                        @if(session('success_msg'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <strong>Success!</strong> {{ session()->get('success_msg') }}
                        </div>
                        @endif
                        @if(session('error_msg'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <strong>Error!</strong> {{ session()->get('error_msg') }}
                        </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.points.add') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="user_id" class="form-label fw-bold text-dark">User ID</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-person-fill"></i></span>
                                    <input type="number" id="user_id" name="user_id" class="form-control form-control-lg custom-input" required placeholder="Enter User ID">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="points" class="form-label fw-bold text-dark">Points</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-coin"></i></span>
                                    <input type="number" id="points" name="points" class="form-control form-control-lg custom-input" required placeholder="Enter Points">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="amount_paid" class="form-label fw-bold text-dark">Amount Paid</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="number" id="amount_paid" name="amount_paid" class="form-control form-control-lg custom-input" required placeholder="Enter Amount Paid">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-3 shadow-lg" style="background: linear-gradient(135deg, #012955, #0052a5); border: none; border-radius: 25px; padding: 12px; transition: 0.3s;">
                                    <i class="bi bi-plus-circle"></i> Add Points
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease-in-out;
    }

    .custom-heading {
        font-size: 1.6rem;
        font-weight: bold;
        text-align: center;
        color: rgb(0, 27, 58);
        text-shadow: 0px 0px 8px rgba(0, 27, 58, 0.8),
            0px 0px 16px rgba(0, 27, 58, 0.5);
        padding: 15px;
        margin-bottom: 15px;
    }

    .custom-input:focus {
        border-color: #0052a5 !important;
        box-shadow: 0 0 10px rgba(0, 82, 165, 0.6);
    }

    .custom-icon {
        background: linear-gradient(135deg, #012955, #0052a5);
        color: white;
        border-radius: 12px;
        padding: 12px;
        font-size: 1.2rem;
    }

    .btn:hover {
        background: linear-gradient(135deg, rgb(1, 39, 75), rgb(5, 90, 165)) !important;
        transform: scale(1.03);
    }
</style>
@endsection