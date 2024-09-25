<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title') </title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/img/favicons/favicon-16x16.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/md-nichrome-test" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/auth.css" />
    @stack('styles')
</head>

<body>
    <main>
        @yield('content')
    </main>


</body>

</html>
