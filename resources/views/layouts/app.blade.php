{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
        }

        header {
            background-color: #0044cc;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
        }

        main {
            padding: 20px;
            background-color: white;
        }
    </style>
</head>
<body>
    <header>
        <!-- Add your site's header content -->
        <h1>Welcome to the Cool Tech Blog</h1>
    </header>

    <main>
        @yield('content') <!-- Main content will be injected here -->
    </main>

    <!-- Include cookie notice -->
    @include('components.cookie-notice')

    <!-- Include footer -->
    @include('components.footer')
</body>
</html>
