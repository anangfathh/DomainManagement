@extends('layouts.buyer')

@section('content')
<div class="row justify-content-start mb-3">
    <!-- Category buttons and search input -->
</div>
<div class="row">
    <!-- Display menu cards -->
    @foreach ($menus as $menu)
    <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card">
            <!-- Card content -->
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">{{ $menu->name }}</h4>
                </div>
                <img class="img-fluid w-100" src="{{ asset('storage/' . $menu->image) }}" alt="Card image cap" height="100px">
            </div>
            <!-- Card footer -->
            <div class="card-footer d-flex justify-content-between">
                <span>Rp{{ $menu->price }}</span>
                <div class="input-group justify-content-end">
                    <span class="input-group-btn">
                        <button class="btn btn-danger btn-minus" type="button" data-product-id="{{ $menu->id }}">-</button>
                    </span>
                    <input id="input-number-{{ $menu->id }}" type="number" class="form-control" value="0">
                    <span class="input-group-btn">
                        <button class="btn btn-success btn-plus" type="button" data-product-id="{{ $menu->id }}">+</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- List order card -->
    <div class="col-xl-3 col-md-6 col-sm-12">
        <div class="card">
            <!-- Card content -->
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">List Order</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="order-table-body">
                                    <!-- Dynamically populate order items here -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Total Price -->
                        <div class="mt-3">
                            <label for="total-price">Total Price:</label>
                            <span id="total-price">Rp0</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card footer -->
            <div class="card-footer d-flex justify-content-between">
                <button class="btn btn-success">Order</button>
            </div>
        </div>
    </div>
</div>
@endsection
