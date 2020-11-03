@extends('template_backend/home')
@section('sub-breadcrumb', 'Order Detail')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    {{-- @if(!empty($profil->logo_kecamatan))
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset($profil->logo_kecamatan) }}"
                    alt="Logo Kecamatan">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/no-photo.jpg') }}"
                        alt="Logo Kecamatan">
                    @endif --}}
                </div>

                <hr>
                <div class="row">
                    <div class="col-6">
                        <a href="" class="btn btn-success btn-block">Accept</a>
                    </div>
                    <div class="col-6">
                        <a href="" class="btn btn-danger btn-block">Reject</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                                        <small class="float-right">Date : {{ Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info d-flex justify-content-end">
                                <div class="col-sm-4 invoice-col">
                                   <table>
                                       <tr>
                                           <td><b>Invoice</b></td>
                                           <td>:</td>
                                           <td><b>#{{ $order->code_order }}</b></td>
                                       </tr>
                                       <tr>
                                           <td><b>Customer</b></td>
                                           <td>:</td>
                                           <td>{{ $order->user->name }}</td>
                                       </tr>
                                       <tr>
                                           <td><b>Number Phone</b></td>
                                           <td>:</td>
                                           <td>{{ $order->user->no_phone }}</td>
                                       </tr>
                                       <tr>
                                           <td><b>Address :</b></td>
                                           <td>:</td>
                                           <td> <address>
                                            {{ $order->user->address }}
                                             </address>
                                        </td>
                                       </tr>
                                   </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Image</td>
                                                <td>Description</td>
                                                <td>Qty</td>
                                                <td>Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderDetail as $item => $cart)
                                                <tr>
                                                    <td>{{ $item + 1}}</td>
                                                    <td>
                                                        <img src="{{ asset($cart->product->image)}}" alt="{{ $cart->product->name }}" height="60px">
                                                    </td>
                                                    <td>
                                                        {{ $cart->product->name }} <br>
                                                        {{ $cart->description }}
                                                    </td>
                                                    <td>{{ $cart->qty_order }}</td>
                                                    <td align="right"><strong>Rp. {{ number_format($cart->total_price) }}</strong></td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <div class="media">
                                        <img src="{{ asset('assets/bri.png')}}" class="mr-3 img-fluid" width="60px" height="60px" alt="...">
                                        <div class="media-body">
                                            <h5 class="mt-0">Bank BRI</h5>
                                            <table>
                                                <tr>
                                                    <td>Nomor Rekening</td>
                                                    <td>:</td>
                                                    <td>xxx-xxx-xxx-xxx</td>
                                                </tr>
                                                <tr>
                                                    <td>Atas Nama</td>
                                                    <td>:</td>
                                                    <td><strong>Empires And Allies</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            @if(!empty($order))
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rp. {{ number_format($order->total_price) }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                            </tr> --}}
                                            <tr>
                                                <th>Code Unique:</th>
                                                <td>Rp. {{ number_format($order->code_unique) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rp. {{ number_format($order->total_price + $order->code_unique) }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
