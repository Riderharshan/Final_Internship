@extends('admin.layout')

@section('content')

<h2 class="page-title">Edit Product</h2>

<div class="admin-form-wrapper">

    <form method="POST"
          action="{{ route('admin.products.update', $product->id) }}"
          enctype="multipart/form-data"
          class="admin-form">

        @csrf

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name"
                   value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price"
                   value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label>Bike Brand</label>
            <input type="text" name="bike_brand"
                   value="{{ $product->bike_brand }}" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            @if($product->image)
                <img src="{{ asset('images/'.$product->image) }}"
                     width="120" style="border:1px solid red;border-radius:8px;">
            @endif
        </div>

        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-actions">
            <button class="action-btn">
                Update Product
            </button>

            <a href="{{ route('admin.products') }}"
               class="action-btn secondary">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection
