<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rider's Den</title>
     
    <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/web-logo.png') }}" type="image/x-icon">
 
 
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@if(!request()->is('admin*'))
<header class="header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center py-3">

            <!-- LOGO -->
            <div class="logo-area">
                <a href="/" style="display:flex;align-items:center;gap:15px;text-decoration:none;">
                    <img src="{{ asset('images/web-logo.png') }}"
                         alt="Rider's Den"
                         class="img-fluid"
                         style="max-height:60px;">
                   <h1 class="m-0" style="font-weight:700;">Rider's Den</h1>

                </a>
            </div>

            <!-- DESKTOP NAV -->
            <nav class="nav-right d-none d-md-flex align-items-center gap-4">

                <a href="/">
                    <i class="fa fa-house"></i>
                    <span>Home</span>
                </a>

                <a href="/products">
                    <i class="fa fa-motorcycle"></i>
                    <span>Products</span>
                </a>

                <a href="/cart" style="position:relative;">
                    <i class="fa fa-cart-shopping"></i>
                    <span>Cart</span>
                    <span id="cart-count"
                          style="position:absolute;top:-6px;right:-10px;
                          background:#e53935;color:#000;font-size:12px;font-weight:bold;
                          padding:2px 7px;border-radius:50%;">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>

                @auth
                    <a href="/profile">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <a href="/about-us">
                        <i class="fa fa-circle-info"></i>
                        <span>About Us</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fa fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <i class="fa fa-right-to-bracket"></i>
                        <span>Login</span>
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="fa fa-user-plus"></i>
                        <span>Register</span>
                    </a>
                @endauth
            </nav>

            <!-- MOBILE HAMBURGER -->
            <button class="hamburger d-md-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mobileMenu"
                    aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

        <!-- MOBILE MENU -->
        <div class="collapse d-md-none" id="mobileMenu">
            <div class="mobile-nav text-start">

                <a href="/">
                    <i class="fa fa-house"></i> Home
                </a>

                <a href="/products">
                    <i class="fa fa-motorcycle"></i> Products
                </a>

                <a href="/cart">
                    <i class="fa fa-cart-shopping"></i>
                    Cart ({{ count(session('cart', [])) }})
                </a>

                @auth
                    <a href="/profile">
                        <i class="fa fa-user"></i> Profile
                    </a>

                    <a href="/about-us">
                        <i class="fa fa-circle-info"></i> About Us
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mobile-logout">
                            <i class="fa fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <i class="fa fa-right-to-bracket"></i> Login
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                @endauth

            </div>
        </div>

    </div>
</header>
@endif

<!-- PAGE CONTENT -->
<main class="container-fluid page-transition px-4" id="page-content">

    @yield('content')
</main>


<!-- FOOTER -->
<!-- FOOTER -->
{{-- <!-- FOOTER -->
<!-- FOOTER -->
<footer class="footer py-3"
        style="width:100%; margin-top:auto; background:#000; border-top:1px solid #e53935;">

    <div class="container-fluid position-relative text-center">

        <!-- CENTER COPYRIGHT -->
        <div style="color:#ffffff; font-size:14px;">
            © {{ date('Y') }} Rider's Den. All rights reserved.
        </div>

        <!-- RIGHT SIDE DESIGN CREDIT -->
        <div class="d-none d-md-block"
             style="position:absolute; right:20px; top:50%; transform:translateY(-50%); font-size:14px;">
            <span style="color:#ffffff;">Designed & Developed by</span>
            <span style="color:#e53935; font-weight:1000; font-size:20px;">Rider Harshan</span>
        </div>

        <!-- MOBILE DESIGN CREDIT (below copyright) -->
        <div class="d-md-none mt-2" style="font-size:14px;">
            <span style="color:#ffffff;">Designed & Developed by</span>
            <span style="color:#e53935; font-weight:1000;font-size:20px;">Rider Harshan</span>
        </div>

    </div>

</footer> --}}

<!-- FOOTER -->
<footer class="footer py-3"
        style="width:100%; margin-top:auto; background:#000; border-top:0px solid #e53935;">

    <div class="container-fluid text-center">

        <div style="font-size:10px;">
            <span style="color:#ffffff;">Designed & Developed by</span>
            <span style="color:#ff312d; font-weight:1000; font-size:20px;">
                Rider Harshan
            </span>
        </div>

    </div>

</footer>





<style>
html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container {
    flex: 1;
}
</style>


<!-- TOAST -->
<div id="toast"
     style="position:fixed;top:90px;left:50%;transform:translateX(-50%);
     background:red;color:#000;padding:14px 26px;border-radius:12px;
     font-weight:bold;display:none;z-index:9999;
     box-shadow:0 0 25px rgba(255,0,0,0.6);min-width:280px;">
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- ALL YOUR ORIGINAL SCRIPTS (UNCHANGED) -->

<script>
function showToast(message) {
    const toast = document.getElementById('toast');
    toast.innerText = message;
    toast.style.display = 'block';
    toast.style.opacity = '1';

    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.style.display = 'none', 300);
    }, 1200);
}
</script>

<script>
function addToCart(productId) {
    fetch(`/add-to-cart-ajax/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showToast(data.message);
            setTimeout(() => location.reload(), 800);
        }
    });
}
</script>

<script>
function increaseQty(id) {
    fetch('/cart/increase', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('qty-' + id).innerText = data.quantity;
        document.getElementById('cart-total').innerText = data.total;
    });
}

function decreaseQty(id) {
    fetch('/cart/decrease', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    })
    .then(res => res.json())
    .then(data => {
        if (data.removed) {
            document.getElementById('item-' + id)?.remove();
        } else {
            document.getElementById('qty-' + id).innerText = data.quantity;
        }

        document.getElementById('cart-total').innerText = data.total;

        if (data.total == 0) {
            fetch('/cart-empty-view')
                .then(res => res.text())
                .then(html => {
                    document.querySelector('.container').innerHTML = html;
                });
        }
    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('themeToggle');
    const text = document.getElementById('themeText');
    const icon = btn?.querySelector('i');

    if (localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-mode');
        text && (text.innerText = 'Light');
        icon && (icon.className = 'fa fa-sun');
    }

    btn?.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');

        const isLight = document.body.classList.contains('light-mode');
        localStorage.setItem('theme', isLight ? 'light' : 'dark');

        if (text) text.innerText = isLight ? 'Light' : 'Dark';
        if (icon) icon.className = isLight ? 'fa fa-sun' : 'fa fa-moon';
    });
});
</script>

<script>
function setRating(star, value) {
    const container = star.parentElement;
    const form = container.closest('form');
    const input = form.querySelector('.rating-value');

    input.value = value;

    container.querySelectorAll('i').forEach((s, i) => {
        s.classList.toggle('filled', i < value);
        s.classList.toggle('fa-solid', i < value);
        s.classList.toggle('fa-regular', i >= value);
    });

    setTimeout(() => form.submit(), 300);
}
</script>

<script>
setTimeout(() => {
    document.querySelectorAll('.auto-hide-alert').forEach(alert => {
        alert.classList.add('fade-out-alert');
    });
}, 10000);
</script>

</body>
</html>
