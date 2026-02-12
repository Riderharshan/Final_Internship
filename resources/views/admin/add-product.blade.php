@extends('admin.layout')


@section('content')

<h2 class="page-title reveal delay-1">Add Product (Admin)</h2>

<div class="admin-form-wrapper reveal delay-2">

    <form method="POST"
          action="{{ route('admin.products.store') }}"
          enctype="multipart/form-data"
          class="admin-form">

        @csrf

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" required>
        </div>

        <div class="form-group">
            <label>Bike Brand</label>
            <input type="text" name="bike_brand" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-actions">
            <button type="submit" class="action-btn">
                Add Product
            </button>

            <a href="{{ route('admin.products') }}"
               class="action-btn secondary">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection
