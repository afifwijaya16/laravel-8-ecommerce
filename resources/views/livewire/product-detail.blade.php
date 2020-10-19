<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/products') }}">All Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="font-wight-600">
                {{ $product->name }}
            </h2>
             @if($product->is_ready ==1)
                <span class="badge badge-success"><i class="fa fa-check"></i>Ready Stock</span>
            @else
                <span class="badge badge-danger"><i class="fa fa-times"></i>Empty</span>
            @endif
            <h4>Rp. {{ number_format($product->price)}}</h4>
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="AddToCart">
                    <table class="table">
                        <tr>
                            <td>Category</td>
                            <td> : </td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Qty</td>
                            <td> : </td>
                            <td>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger" wire:click="decrease"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input id="qty_order" type="number" class="form-control" value="{{ $qty_order }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" wire:click="increase"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td> : </td>
                            <td>
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" wire:model="description" value="{{ old('description') }}">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        @if($qty_order >= 1) 
                        <tr>
                            <td>Total Price</td>
                            <td> : </td>
                            <td>
                                <label class="form-label">Rp. {{ number_format($total_price) }}</label>
                                <input id="total_price" type="hidden" class="form-control @error('total_price') is-invalid @enderror" value="{{ $total_price }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled title="Empty" @endif > <i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </td>
                        </tr>
                        @endif
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
