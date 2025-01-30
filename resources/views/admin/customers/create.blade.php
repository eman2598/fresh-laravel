@extends('layouts.auth')

@section('content')
<div class="col-9">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-8 col-lg-6">

                <h2 class="custom-heading text-center">Add New Customer</h2>

                <div class="card border-0 rounded shadow-lg p-4" style="background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(15px); border-radius: 20px;">

                    <div class="card-header text-center" style="background: linear-gradient(135deg, #012855, #0052a5); color: white; border-radius: 15px 15px 0 0;">
                        <h4 class="mb-0">Enter Customer Details</h4>
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
                        <form method="POST" action="{{ route('admin.customers.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold text-dark">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" class="form-control form-control-lg custom-input" required placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold text-dark">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" class="form-control form-control-lg custom-input" required placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold text-dark">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text custom-icon"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password" class="form-control form-control-lg custom-input" required placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-3 shadow-lg" style="background: linear-gradient(135deg, #012955, #0052a5); border: none; border-radius: 25px; padding: 12px; transition: 0.3s;">
                                    <i class="bi bi-person-plus-fill"></i> Add Customer
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

    .alert-success {
        background-color: rgb(0, 27, 58);
        color: white;
    }

    .alert-danger {
        background-color: #e83e8c;
        color: white;
    }
</style>
@endsection