<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
    @yield('headSection')
    <title>@yield('titleSection')</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('Home@Amazon')}}">Home</a></li>
            <li><a href="{{route('AboutUs@Amazon')}}">About Us</a></li>
            <li><a href="{{route('contactUs@Amazon')}}">Contact Us</a></li>
        </ul>
    </nav>
    @yield('mainSection')
    <footer>
        <p style="text-align: center"> copyrights@ahmadreda.com </p>
    </footer>
</body>
</html>







