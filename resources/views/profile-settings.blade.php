@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Settings</h2>

<div class="profile-wrapper reveal delay--2">

    <div class="profile-card settings-card">

        <!-- 🧾 MY ORDERS -->
        <a href="/my-orders"
           class="action-btn secondary settings-item-btn reveal delay-3">
            <i class="fa fa-receipt reveal delay-1"></i>
            My Orders
        </a>

        <!-- 🚚 ORDER STATUS -->
        <a href="/order-status"
           class="action-btn settings-item-btn reveal delay--3">
            <i class="fa fa-truck-fast reveal delay-1"></i>
            Order Status
        </a>

        <!-- 🌗 THEME -->
        <div class="setting-row settings-item-btn theme-row">

            <div class="setting-left reveal delay-2">
                <i class="fa fa-palette reveal delay-1"></i>
                <span>Theme</span>
            </div>

            <button id="themeToggle" class="theme-toggle-btn reveal delay-3">
                <i class="fa fa-moon reveal delay-4"></i>
                <span id="themeText">Dark</span>
            </button>

        </div>

        <!-- 👤 EDIT PROFILE -->
        <a href="/profile/edit"
           class="action-btn settings-item-btn reveal delay-3">
            <i class="fa fa-user-edit reveal delay-1"></i>
            Edit Profile
        </a>

        <a href="/profile/addresses"
         class="action-btn settings-item-btn reveal delay-4">
          <i class="fa fa-location-dot reveal delay-1"></i>
                 Saved Addresses
                  </a>
        <a href="/profile/change-password" 
         class="action-btn settings-item-btn reveal delay-4">
    <i class="fa fa-lock reveal delay-1"></i> Change Password
</a>


    </div>

</div>

@endsection
