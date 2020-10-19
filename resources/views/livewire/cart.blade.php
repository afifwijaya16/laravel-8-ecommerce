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
                <div class="alert alert-success">
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
                            <td>Total Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetailGet as $item => $cart)
                        <tr>
                            <td>{{ $item + 1}}</td>
                            <td>
                                <img src="{{ asset($cart->product->image)}}" alt="{{ $cart->product->name }}" height="100px">
                            </td>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ $cart->qty_order }}</td>
                            <td>Rp. {{ number_format($cart->product->price) }}</td>
                            <td>Rp. {{ number_format($cart->total_price) }}</td>
                        </tr>
                       
                        @endforeach
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
