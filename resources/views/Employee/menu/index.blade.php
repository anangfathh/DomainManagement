<!-- resources/views/menus/index.blade.php -->

@extends('layouts.yy')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success color-success alert-dismissible"><i class="bi bi-check-circle"></i>
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h2>Menu List</h2>
                <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Add Menu</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->price }}</td>
                                <td>{{ $menu->category }}</td>
                                <td>
                                    <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
