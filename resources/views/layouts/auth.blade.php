<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .sidebar {
            background-color: rgb(233, 233, 250);
            height: 100vh;
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            width: 240px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            padding: 20px;
        }

        .sidebar.collapsed {
            width: 60px !important;
            padding: 20px 10px;
        }

        .menu-item {
            color: gray;
            font-weight: 500;
            font-size: large;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 30px;
            transition: all 0.3s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .menu-item:hover {
            background-color: rgb(0, 27, 58);
            color: white;
        }

        .sidebar.collapsed .menu-text {
            display: none;
        }

        .toggle-btn {
            font-size: 24px;
            cursor: pointer;
            padding: 10px;
        }

        .content {
            margin-left: 240px;
            transition: margin-left 0.3s ease-in-out;
            padding: 20px;
            color: rgb(0, 27, 58);
            width: calc(100% - 240px);
        }

        .sidebar.collapsed+.content {
            margin-left: 60px;
            width: calc(100% - 60px);
        }

        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px;
            border-radius: 30px;
            margin-top: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100px;
            }

            .content {
                margin-left: 100px;
                width: calc(100% - 100px);
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Sidebar -->
                <div class="sidebar shadow" id="sidebar">
                    <div class="menu-item" id="toggleSidebar">
                        <i class="bi bi-list"></i>
                        <span class="menu-text">Menu</span>
                    </div>
                    <ul class="list-unstyled mt-4">
                        <li>
                            <a href="/dashboard" class="menu-item text-decoration-none">
                                <i class="bi bi-speedometer2"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        @if(auth()->user()->role == 'admin')
                        <li class="mt-2">
                            <a href="{{route('admin.points')}}" class="menu-item text-decoration-none">
                                <i class="bi bi-file-earmark-ppt"></i>
                                <span class="menu-text">Add Points</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="{{route('admin.transactions.index')}}" class="menu-item text-decoration-none">
                                <i class="bi bi-coin"></i>
                                <span class="menu-text">Transactions</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="{{ route('admin.customers.index') }}" class="menu-item text-decoration-none">
                                <i class="bi bi-people"></i>
                                <span class="menu-text">View All Customers</span>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a href="{{ route('admin.customers.create') }}" class="menu-item text-decoration-none">
                                <i class="bi bi-person"></i>
                                <span class="menu-text">Create User</span>
                            </a>
                        </li>

                        @endif
                    </ul>

                    <!-- Logout Button -->
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="menu-text">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Main Content -->
            <div class="content" id="mainContent">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#toggleSidebar").click(function() {
                $("#sidebar").toggleClass("collapsed");
            });
        });
    </script>

</body>

</html>