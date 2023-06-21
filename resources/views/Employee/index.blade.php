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
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>
                                                    @if($order->status === "pending")
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($order->status === "success")
                                                        <span class="badge bg-success">Success</span>
                                                    @elseif($order->status === "canceled")
                                                        <span class="badge bg-danger">Canceled</span>
                                                    @endif
                                                </td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>Rp{{ $order->total }}</td>
                                                <td><button class="btn"><i class="bi bi-box-arrow-down"></i></button></td>
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
