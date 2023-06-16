@extends('layouts.buyer')


@section('content')
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Pisang Radja</h4>
                        </div>
                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg" alt="Card image cap">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Card Footer</span>
                        <button class="btn btn-light-primary">Read More</button>
                    </div>
                </div>


                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Card With Header And Footer</h4>
                            <p class="card-text">
                                Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee
                                sugar plum sugar plum jelly-o jujubes bonbon dessert carrot cake.
                            </p>
                        </div>
                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg" alt="Card image cap">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Card Footer</span>
                        <button class="btn btn-light-primary">Read More</button>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 col-sm-12">                
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Card With Header And Footer</h4>
                        </div>
                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg" alt="Card image cap">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Rp30.000,00</span>
                        <button class="btn btn-light-primary">Read More</button>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-sm-12">                
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Card With Header And Footer</h4>
                        </div>
                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg" alt="Card image cap">
                    </div>
                    <div class="card-footer d-flex">
                            <span class="justify-content-start">Card Footer</span>
                            <div class="input-group justify-content-end">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger btn-minus" type="button">-</button>
                                    </span>
                                    <input type="number" class="form-control" value="0">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-plus" type="button">+</button>
                                    </span>
                            </div>
                    </div>
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
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">Michael Right</td>
                                            <td>$15/hr</td>
                                            <td class="text-bold-500">UI/UX</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Morgan Vanblum</td>
                                            <td>$13/hr</td>
                                            <td class="text-bold-500">Graphic concepts</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Tiffani Blogz</td>
                                            <td>$15/hr</td>
                                            <td class="text-bold-500">Animation</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Ashley Boul</td>
                                            <td>$15/hr</td>
                                            <td class="text-bold-500">Animation</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Mikkey Mice</td>
                                            <td>$15/hr</td>
                                            <td class="text-bold-500">Animation</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button class="btn btn-success">Order</button>
                    </div>
                </div>
            </div>
        </div>



@endsection