@extends('layouts.buyer')

@section('content')
<div class="row">
    <div class="col">
        <div class="row justify-content-start mb-3">
            <!-- Category buttons and search input -->
            <div class="col-lg-12 col-md-12">
                <h3>List Menu</h3>
                <div class="row">
                    <div class="col-9">
                        <button class="btn btn-outline-primary m-2" data-category="all">All</button>
                        <button class="btn btn-outline-primary m-2" data-category="Drink">Drink</button>
                        <button class="btn btn-outline-primary m-2" data-category="Food">Food</button>
                        <button class="btn btn-outline-primary m-2" data-category="Dessert">Dessert</button>
                    </div>
                    <div class="col-3">
                        <input type="text" id="searchInput" placeholder="Search Menu" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Display menu cards -->
            @foreach ($menus as $menu)
            <div class="col-xl-4 col-md-6 col-sm-12 card-container {{$menu->category}}">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">{{ $menu->name }}</h4>
                        </div>
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $menu->image) }}" alt="Card image cap" style="max-width: 500px; height: 300px;">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Rp{{ $menu->price }}</span>
                        <div class="input-group justify-content-end">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-danger btn-minus" type="button" data-product-id="{{ $menu->id }}">-</button>
                                        <input id="input-number-{{ $menu->id }}" type="number" class="form-control" value="0">
                                        <button class="btn btn-success btn-plus" type="button" data-product-id="{{ $menu->id }}">+</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">List Order</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th class="col-2">Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="order-table-body">
                                    <!-- Dynamically populate order items here -->
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <label for="total-price">Total Price:</label>
                            <span id="total-price">Rp0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <button id="order-btn" class="btn btn-success">Order</button>
            </div>
        </div>
    </div>
</div>


<!-- List order card -->
@endsection

