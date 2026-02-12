@extends('layout.app')

@section('content')

<h2 class="page-title">Edit Profile</h2>

<div class="profile-wrapper">

    <form class="profile-card profile-edit-card"
          method="POST"
          action="/profile/update"
          enctype="multipart/form-data">

        @csrf

        <div class="profile-image edit-image">
            <img src="{{ asset('storage/profile/'.auth()->user()->profile_image) }}"
                 onerror="this.src='{{ asset('images/default-profile.png') }}'">
        </div>

        <div class="profile-edit-fields">

            <label>Name</label>
            <input type="text" name="name"
                   value="{{ auth()->user()->name }}" required>

            <label>Email</label>
            <input type="email" name="email"
                   value="{{ auth()->user()->email }}" required>

            <label>Profile Picture</label>
            <input type="file" name="profile_image" accept="image/*">

            <div class="edit-actions">
                <button type="submit" class="action-btn">
                     Save Changes
                </button>

                <a href="/profile" class="cancel-btn">
                    ✖ Cancel
                </a>
            </div>

        </div>

    </form>

</div>

@endsection
