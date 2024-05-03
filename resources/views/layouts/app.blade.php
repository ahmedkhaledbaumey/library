<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav ul li.active {
            border-bottom: 2px solid #3498db; /* Highlight active link */
        }

        nav ul li a:hover {
            color: #3498db;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .back-btn,
        .book-details-btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-btn {
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #2980b9;
        }

        .book-details-btn {
            background-color: #2ecc71;
            color: #fff;
            text-decoration: none;
        }

        .book-details-btn:hover {
            background-color: #27ae60;
        }

        .auth-links {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .auth-links li {
            display: inline;
            margin-right: 20px;
        }

        .auth-links li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        .auth-links li a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>
    <header>
        <h1>Laravel App</h1>
        <nav>
            <ul>
                <li class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="{{ request()->routeIs('books.index') ? 'active' : '' }}">
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container mt-4">
        <ul class="auth-links">
            @auth
                <li><a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route("registerForm") }}">Register</a></li> 
                <li><a href="{{ route("loginForm") }}">Login</a></li>
            @endauth
        </ul>
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-2">
        <p>&copy; {{ date('Y') }} Laravel App</p>
    </footer>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
