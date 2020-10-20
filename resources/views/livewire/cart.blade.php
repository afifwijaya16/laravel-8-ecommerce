<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Gambar</td>
                            <td>Description</td>
                            <td>Qty</td>
                            <td>Price</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetailGet as $item => $cart)
                        <tr>
                            <td>{{ $item + 1}}</td>
                            <td>
                                <img src="{{ asset($cart->product->image)}}" alt="{{ $cart->product->name }}" height="100px">
                            </td>
                            <td>
                                {{ $cart->product->name }} <br>
                                {{ $cart->description }}
                            </td>
                            <td>{{ $cart->qty_order }}</td>
                            <td align="right"><strong>Rp. {{ number_format($cart->total_price) }}</strong></td>
                            <td><button wire:click="destroyCart({{$cart->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                        @if(!empty($orderGet))
                            <tr>
                                <td colspan="4" align="right"> <strong>Total Price</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($orderGet->total_price) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"> <strong>Code Unique</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($orderGet->code_unique) }}</strong> </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"> <strong>Grand Price</strong> </td>
                                <td align="right"><strong>Rp. {{ number_format($orderGet->total_price + $orderGet->code_unique) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="2">
                                    <a href="{{ route('checkout')}}" class="btn btn-success btn-block">
                                        <i class="fa fa-arrow-right"></i> Checkout 
                                    </a>
                                </td>
                            </tr>
                        @endif
                        @empty($orderDetailGet)
                            <tr>
                                <td colspan="6" class="text-center"> Cart Empty</td>
                            </tr>
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
