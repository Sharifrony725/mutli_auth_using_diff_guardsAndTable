<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>PHP OOP</title>
</head>

<body>
    <nav class="nav navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div class="float-left navbar-brand">
                <a href="http://" class="navbar-expand">LOGO</a>
            </div>
            <div class="float-right">
                <ul class="navbar-nav">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    @if (!Auth::guard('web')->user())
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li><a href="{{ route('registration') }}" class="nav-link">Registration</a></li>
                    @endif
                    @if(Auth::guard('web')->user())
                            <li><a href="{{ route('dashboard_user') }}" class="nav-link">Dashboard</a></li>
                             <li><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                      @endif
                            <li><a href="{{ route('forget_password') }}" class="nav-link">Forget Password</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
