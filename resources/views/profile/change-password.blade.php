@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Change Password</h2>

{{-- 🔔 NOTIFICATION AREA (TOP, CENTERED) --}}
<div style="max-width:420px; margin:0 auto 25px;">

    {{-- ❌ ERROR MESSAGE --}}
    @if($errors->any())
        <div class="alert-caution auto-hide-alert">

            <i class="fa fa-triangle-exclamation"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    {{-- ✅ SUCCESS MESSAGE --}}
    @if(session('success'))

    {{-- ✅ SUCCESS MESSAGE --}}
    <div class="alert-success-red auto-hide-alert">

        <i class="fa fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>

    {{-- 🎉 FULLSCREEN SUCCESS OVERLAY --}}
    <div id="passwordSuccessOverlay">

        <script
          src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
          type="module">
        </script>

        <dotlottie-wc
          src="https://lottie.host/2fd969d0-e867-4929-8fb6-a486a3c0ffd7/XsdAQkhXcm.lottie"
          autoplay>
        </dotlottie-wc>

    </div>

    {{-- ⏱ AUTO HIDE AFTER 5 SECONDS --}}
    <script>
        setTimeout(() => {
            const overlay = document.getElementById('passwordSuccessOverlay');
            if (overlay) {
                overlay.classList.add('hide-overlay');
            }
        }, 5000);
    </script>

@endif


</div>

{{-- 🔐 CHANGE PASSWORD FORM (CENTERED) --}}
<div style="display:flex; justify-content:center; margin-top:30px;">

    <form method="POST"
          action="/profile/change-password"
          class="profile-card change-password-card">

        @csrf

        <div class="password-grid reveal delay-3">

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password" required>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="new_password_confirmation" required>
            </div>

            <div class="form-group">
                <label>Security Check: {{ $a }} + {{ $b }} ?</label>
                <input type="number" name="captcha" required>
            </div>

        </div>

        <!-- BUTTON AT BOTTOM -->
        <div class="password-action reveal delay-4">
            <button class="action-btn">
                <i class="fa fa-lock"></i> Update Password
            </button>
        </div>

    </form>

</div>


@endsection
