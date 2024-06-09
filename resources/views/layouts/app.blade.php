<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="favicon.svg" type="image/svg+xml">
</head>

<body>

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none m-1">
        <span class="fs-1"><i class="bi bi-house"></i> Admin Panel</span>
    </a>

    <ul class="nav nav-pills m-3">
        <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('properties.index') }}">Properties</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('types.index') }}">Types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('areas.index') }}">Areas</a></li>
    </ul>
</header>

    <div class="container-fluid" >
        @yield('content')
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
