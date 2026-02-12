@extends('admin.layout')

@section('content')

<h2 class="page-title reveal delay-1">Admin – Products List</h2>

{{-- ✅ PRODUCT ADDED --}}
@if(session('product_added'))
    <div class="admin-success">
        {{ session('product_added') }}
    </div>
@endif

{{-- ✅ PRODUCT UPDATED --}}
@if(session('product_updated'))
    <div class="admin-success">
        {{ session('product_updated') }}
    </div>
@endif

{{-- fallback (if already using success somewhere) --}}
@if(session('success'))
    <div class="admin-success">
        {{ session('success') }}
    </div>
@endif

<div class="admin-table-wrapper reveal delay-2">

    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>

                <td>
                    @if($product->image)
                        <img src="{{ asset('images/'.$product->image) }}"
                             class="admin-product-img">
                    @else
                        <span class="no-img">No Image</span>
                    @endif
                </td>

                <td>{{ $product->name }}</td>

                <td>₹{{ number_format($product->price, 2) }}</td>

                <td>
                    <!-- ✅ EDIT BUTTON -->
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="admin-edit-btn">
                        Edit
                    </a>

                    <!-- DELETE BUTTON -->
                    <a href="{{ route('admin.products.delete', $product->id) }}"
                       onclick="return confirm('Are you sure?')"
                       class="admin-delete-btn">
                        Delete
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

</div>


<script>
    setTimeout(() => {
        document.querySelectorAll('.admin-success').forEach(el => {
            el.style.transition = 'opacity 0.4s ease';
            el.style.opacity = '0';

            setTimeout(() => {
                el.style.display = 'none';
            }, 400);
        });
    }, 3000); // ⏱ 3 seconds
</script>

@endsection
