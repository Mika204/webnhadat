<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    @yield('content')
    <script>
        function toggleView() {
            document.getElementById('auth-wrapper')
                .classList.toggle('is-registering');
        }
        </script>
</body>
</html>