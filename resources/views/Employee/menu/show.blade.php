<!-- resources/views/menus/show.blade.php -->

@extends('layouts.yy')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Menu Details</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text"><strong>Price:</strong> {{ $menu->price }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $menu->category }}</p>
                                    <div class="col-md-4">
                <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image" class="img-fluid">
            </div>
                    </div>
                </div>
                <a href="{{ route('menu.index') }}" class="btn btn-secondary mt-3">Back to List</a>
            </div>
        </div>
    </div>
@endsection
