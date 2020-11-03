@extends('template_backend/home')
@section('sub-breadcrumb', 'Product')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Product
            </div>
            <div class="card-body">
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('admin/product/table')
            </div>
        </div>
    </div>
</div>
@include('admin/product/javascript')
@endsection