<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <li><a href="{{ route('info.clients') }}">Clients</a></li>
            <li><a href="{{ route('info.menu') }}">Menu</a></li>
            <li><a href="{{ route('info.manager') }}">Manager</a></li>
        </ul>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>