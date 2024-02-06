<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div>
        <div class="container-fluid link-group w-100 py-3 d-flex justify-content-between">
            <h4 class="font-weight-normal">Laravel Test App</h4>
            <div><!-- Login and Register Links -->
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
            </div>
        </div>

        <div class="container text-center mt-5">

            <h1>Livewire 3 Tutorial</h1>

            <!-- Livewire Counter Component -->
            @livewire('counter')

        </div>
    </div>
</body>

</html>
