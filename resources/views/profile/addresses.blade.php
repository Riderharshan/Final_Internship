@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Saved Addresses</h2>

<div class="address-page reveal delay-2">

@foreach(['address1'=>'Address 1','address2'=>'Address 2'] as $key=>$title)

<form method="POST"
      action="/profile/addresses"
      class="address-card address-form vertical-address"
      data-label="{{ $title }}">
    @csrf
    <input type="hidden" name="label" value="{{ $key }}">

    <h3 class="address-title">{{ $title }}</h3>

    <!-- 🔽 FORCE VERTICAL STACK -->
    <div class="address-vertical">

        <input type="text" name="name" placeholder="Name"
               value="{{ $addresses[$key]->name ?? '' }}" required>

        <input type="email" name="email" placeholder="Email"
               value="{{ $addresses[$key]->email ?? '' }}" required>

        <input type="text" name="phone" placeholder="Phone"
               value="{{ $addresses[$key]->phone ?? '' }}" required>

        <input type="text" name="city" placeholder="City"
               value="{{ $addresses[$key]->city ?? '' }}" required>

        <input type="text" name="pincode" placeholder="Pincode"
               value="{{ $addresses[$key]->pincode ?? '' }}" required>

        <textarea name="address" placeholder="Full Address" required>{{ $addresses[$key]->address ?? '' }}</textarea>

    </div>

    <input type="hidden" name="map_link"
           id="map_{{ $key }}"
           value="{{ $addresses[$key]->map_link ?? '' }}">

    <div class="address-actions">
        <button type="submit" class="action-btn">
            Save {{ $title }}
        </button>
    </div>

</form>

@endforeach

</div>

@endsection
