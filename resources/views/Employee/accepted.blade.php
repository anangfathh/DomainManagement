@extends('layouts.yy')


@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Employee Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order List</h4>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-light-success color-success alert-dismissible"><i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="col-1">Order Id</th>
                                            <th>Status</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>
                                                    @if($order->status === "pending")
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($order->status === "accepted")
                                                        <span class="badge bg-success">Success</span>
                                                    @elseif($order->status === "canceled")
                                                        <span class="badge bg-danger">Canceled</span>
                                                    @endif
                                                </td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>Rp{{ $order->total }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id }}">
                                                    <i class="bi bi-ticket-detailed-fill"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span><h6>Order Id : {{ $order->id }}</h6></span>
                                                            <span><h6>Nama Buyer : {{ $order->user->name }}</h6></span>
                                                            <span><h6>Nomor HP : {{ $order->user->phone_number }}</h6></span>
                                                            <div class="table-responsive">
                                                                <table class="table table-lg">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Menu</th>
                                                                            <th>Quantity</th>
                                                                            <th>Harga</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($order->orderItems as $orderItem)
                                                                        <tr>
                                                                            <td class="text-bold-500">{{ $orderItem->menu_name }}</td>
                                                                            <td>{{ $orderItem->quantity }}</td>
                                                                            <td class="text-bold-500"> {{ $orderItem->total_price }}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                                <div class="container">
                                                                    <h6 class="float-end me-5">Total : Rp{{ $order->total }}</h6>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('orders.done', ['id' => $order->id]) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-success">Done</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </section>
</div>

@endsection
