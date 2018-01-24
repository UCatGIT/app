<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>myHaushalt24.ch</title>

    <!-- Styles -->

    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/images/logo.svg') }}" style="height: 117px;" >
                </a>
            </div>

            <ul class="nav navbar-nav pull-right">
                <li><a href="{{ url('/chores') }}">Chores</a></li>
            </ul>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    
    <script src="{{ url('/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/js/app.js') }}"></script>
</body>

</html>
