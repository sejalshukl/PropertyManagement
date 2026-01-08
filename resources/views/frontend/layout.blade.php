<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Premium Real Estate</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #405189;
            /* Velzon Purple */
            --secondary-color: #3577f1;
            /* Accent Blue */
            --text-dark: #212529;
            --text-muted: #878a99;
            --bg-light: #f3f3f9;
            --card-shadow: 0 1px 2px rgba(56, 65, 74, 0.15);
            --card-hover-shadow: 0 5px 15px rgba(56, 65, 74, 0.15);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #364574;
            border-color: #364574;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: #fff;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        /* Footer */
        footer {
            background-color: #fff;
            border-top: 1px solid #e9ebec;
            color: var(--text-muted);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-building me-2"></i> Property Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('frontend.properties.index') }}">Properties Manage</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm mt-1 px-3" href="{{ route('dashboard') }}">Admin Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm mt-1 px-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content py-5">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} VelzonEstate. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
