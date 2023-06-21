@extends('layouts.buyer')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Nota Dashboard</h3>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-end">
                        <h2 class="card-title">Nota List</h2>
                        <div class="col-1 me-5">
                            <input type="text" class="form-control flatpickr-no-config" id="datePicker" placeholder="Select date">
                        </div>
                    </div>
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
                                            <th>Date</th>
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
                                                <td>{{ $order->created_at->formatLocalized('%A, %d-%m-%Y') }}</td>
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
