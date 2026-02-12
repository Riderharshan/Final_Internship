@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">My Profile</h2>

<div class="profile-wrapper reveal delay--4">

    <!-- PROFILE CARD -->
    <div class="profile-card profile-relative reveal delay-2">

        <!-- ⚙️ SETTINGS ICON (TOP RIGHT – PROFILE ONLY) -->
        <a href="/profile/settings"
           class="profile-settings-icon"
           title="Settings">
            <i class="fa fa-gear"></i>
        </a>

        <!-- PROFILE IMAGE -->
        <div class="profile-image reveal delay-4">
            <img src="{{ asset('storage/profile/'.auth()->user()->profile_image) }}"
                 onerror="this.src='{{ asset('images/default-profile.png') }}'">
        </div>

        <!-- PROFILE DETAILS -->
        <div class="profile-details reveal delay-3">
            <h3>{{ auth()->user()->name }}</h3>
            <p>{{ auth()->user()->email }}</p>

        
        </div>

    </div>

</div>

@endsection
