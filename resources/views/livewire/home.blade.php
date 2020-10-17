<div class="container">
    <div class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('assets/slider/slider1.png')}}" alt="Banner">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <section class="choise-category">
        <div class="row mt-3">
            @foreach ($category as $item)
            <div class="col-6 col-md-3 py-1">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="{{asset($item->image)}}" alt="image-{{$item->name}}" class="img-fluid">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="choise-product">
        <div class="row mt-3 d-flex justify-content-between mx-3">
            <h3 class="row">Best Product</h3>
            <a href="{{route('products')}}" class="btn btn-default"><i class="fa fa-eye"></i> View all</a>
        </div>
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
                                <a href="#" class="btn btn-dark btn-block"><i class="fa fa-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
