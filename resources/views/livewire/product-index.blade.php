<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ !empty($title) ? $title : 'All Category' }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>List Product {{ !empty($title) ? $title : '' }}</h3>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                {{-- <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div> --}}
                <input type="text" wire:model="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <section class="choise-product">
        <div class="row mt-3">
            @foreach ($product as $item)
            <div class="col-6 col-md-3 py-1">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="{{asset($item->image)}}" alt="image-{{$item->name}}" class="img-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>{{$item->name}}</strong></h5>
                                <p> Rp. {{number_format($item->price)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('products.detail', Crypt::encrypt($item->id)) }}" class="btn btn-dark btn-block"><i class="fa fa-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($product->count() == 0)
                <div class="col-12 text-center mt-5">
                    <h5>Product Not Found</h5>
                </div>
            @endif

        </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                {{ $product->links() }}
            </div>
        </div>
    </section>
</div>
