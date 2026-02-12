<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard – Rider's Den</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="header admin-header">
    <div class="logo-area">
        <h1>Admin Panel</h1>
    </div>

    <div class="nav-right">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.products') }}">Products</a>
        <a href="{{ route('admin.orders') }}">Orders</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="/">Go to Site</a>
    </div>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
