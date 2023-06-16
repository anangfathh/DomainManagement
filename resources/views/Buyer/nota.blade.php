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
                        <input type="date" class="form-control flatpickr-no-config" placeholder="Select date">
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
                            <th>Order Id</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Graiden</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td><button class="btn"><i class="bi bi-box-arrow-down"></i></button></td>
                        </tr>
                        <tr>
                            <td>Dale</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                        </tr>
                        <tr>
                            <td>Nathaniel</td>
                            <td>
                                <span class="badge bg-danger">Canceled</span>
                            </td>
                            <td>mi.Duis@diam.edu</td>
                            <td>(012165) 76278</td>
                            <td>Grumo Appula</td>
                        </tr>
                        <tr>
                            <td>Darius</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>velit@nec.com</td>
                            <td>0309 690 7871</td>
                            <td>Ways</td>
                        </tr>
                        <tr>
                            <td>Oleg</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>rhoncus.id@Aliquamauctorvelit.net</td>
                            <td>0500 441046</td>
                            <td>Rossignol</td>
                        </tr>
                        <tr>
                            <td>Kermit</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>diam.Sed.diam@anteVivamusnon.org</td>
                            <td>(01653) 27844</td>
                            <td>Patna</td>
                        </tr>
                        <tr>
                            <td>Jermaine</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>sodales@nuncsit.org</td>
                            <td>0800 528324</td>
                            <td>Mold</td>
                        </tr>
                        <tr>
                            <td>Ferdinand</td>
                            <td>
                                <span class="badge bg-danger">Canceled</span>
                            </td>
                            <td>gravida.molestie@tinciduntadipiscing.org</td>
                            <td>(016977) 4107</td>
                            <td>Marlborough</td>
                        </tr>
                        <tr>
                            <td>Kuame</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>Quisque.purus@mauris.org</td>
                            <td>(0151) 561 8896</td>
                            <td>Tresigallo</td>
                        </tr>
                        <tr>
                            <td>Deacon</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                            <td>07740 599321</td>
                            <td>Karapınar</td>
                        </tr>
                        <tr>
                            <td>Channing</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                            <td>0845 46 49</td>
                            <td>Warrnambool</td>
                        </tr>
                        <tr>
                            <td>Aladdin</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>sem.ut@pellentesqueafacilisis.ca</td>
                            <td>0800 1111</td>
                            <td>Bothey</td>
                        </tr>
                        <tr>
                            <td>Cruz</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>non@quisturpisvitae.ca</td>
                            <td>07624 944915</td>
                            <td>Shikarpur</td>
                        </tr>
                        <tr>
                            <td>Keegan</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>molestie.dapibus@condimentumDonecat.edu</td>
                            <td>0800 200103</td>
                            <td>Assen</td>
                        </tr>
                        <tr>
                            <td>Ray</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>placerat.eget@sagittislobortis.edu</td>
                            <td>(0112) 896 6829</td>
                            <td>Hofors</td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>diam@dapibus.org</td>
                            <td>0334 836 4028</td>
                            <td>Thane</td>
                        </tr>
                        <tr>
                            <td>Carter</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>urna.justo.faucibus@orci.com</td>
                            <td>07079 826350</td>
                            <td>Biez</td>
                        </tr>
                        <tr>
                            <td>Stone</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>velit.Aliquam.nisl@sitametrisus.com</td>
                            <td>0800 1111</td>
                            <td>Olivar</td>
                        </tr>
                        <tr>
                            <td>Berk</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>fringilla.porttitor.vulputate@taciti.edu</td>
                            <td>(0101) 043 2822</td>
                            <td>Sanquhar</td>
                        </tr>
                        <tr>
                            <td>Philip</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>turpis@euenimEtiam.org</td>
                            <td>0500 571108</td>
                            <td>Okara</td>
                        </tr>
                        <tr>
                            <td>Kibo</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>feugiat@urnajustofaucibus.co.uk</td>
                            <td>07624 682306</td>
                            <td>La Cisterna</td>
                        </tr>
                        <tr>
                            <td>Bruno</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                            <td>07624 869434</td>
                            <td>Rocca d"Arce</td>
                        </tr>
                        <tr>
                            <td>Leonard</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>blandit.enim.consequat@mollislectuspede.net</td>
                            <td>0800 1111</td>
                            <td>Lobbes</td>
                        </tr>
                        <tr>
                            <td>Hamilton</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>mauris@diam.org</td>
                            <td>0800 256 8788</td>
                            <td>Sanzeno</td>
                        </tr>
                        <tr>
                            <td>Harding</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>Lorem.ipsum.dolor@etnetuset.com</td>
                            <td>0800 1111</td>
                            <td>Obaix</td>
                        </tr>
                        <tr>
                            <td>Emmanuel</td>
                            <td>
                                <span class="badge bg-success">Success</span>
                            </td>
                            <td>eget.lacus.Mauris@feugiatSednec.org</td>
                            <td>(016977) 8208</td>
                            <td>Saint-Remy-Geest</td>
                        </tr>
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
