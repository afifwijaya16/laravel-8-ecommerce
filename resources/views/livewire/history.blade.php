<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Order</th>
                            <th>Date Order</th>
                            <th>Descrition</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item => $order)
                            <tr>
                                <td>{{$item + 1}} </td>
                                <td>{{ $order->code_order }} </td>
                                <td>{{ $order->created_at }} </td>
                                <td>
                                    <table class="table-borderless">
                                        @foreach ($order->order_details as $orderDetail)
                                        <tr>
                                            <td>{{ $orderDetail->product->name }}</td>
                                        <td><img src="{{ asset($orderDetail->product->image)}}" height="30px" alt="{{ $orderDetail->product->name }}"></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>Rp. {{ number_format($order->total_price)}} </td>
                                <td>
                                    @if ($order->status == 1)
                                        <span class="badge badge-danger">Unpaid</span>
                                    @else
                                        <span class="badge badge-success">Paid</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
