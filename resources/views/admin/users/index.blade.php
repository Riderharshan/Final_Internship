@extends('layout.app')

@section('content')

<h2 class="page-title">Registered Users</h2>

<div class="divider"></div>

<div class="orders-card">

    <table class="orders-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined On</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
