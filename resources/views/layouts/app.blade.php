<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="{{ route('products.index') }}">Product Management</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item btn btn-primary btn-sm me-2 ">
                        <a class="nav-link bi bi-list-ul" href="{{ route('products.index') }}"> All Products</a>
                    </li>
                    <li class="nav-item btn btn-success btn-sm ">
                        <a class="nav-link bi bi-plus-lg" href="{{ route('products.create') }}"> Create Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
