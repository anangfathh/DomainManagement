<!-- sales_report.blade.php -->

@extends('layouts.yy')

@section('content')
    <div class="container">
        <h1>Sales Report</h1>
        
        <form action="{{ route('sales.generate_report') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="month">Month</label>
                    <select name="month" id="month" class="form-control">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <!-- ... options for other months ... -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <!-- ... options for other years ... -->
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>
        
        @if(isset($menuSales))
            <h2>Sales Report - {{ Carbon\Carbon::createFromDate($year, $month, 1)->format('F Y') }}</h2>
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menuSales as $menuName => $quantity)
                        <tr>
                            <td>{{ $menuName }}</td>
                            <td>{{ $quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
