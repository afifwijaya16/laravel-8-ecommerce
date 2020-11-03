@extends('template_backend/home')
@section('sub-breadcrumb', 'Order')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Order
            </div>
            <div class="card-body">
                @include('admin/transaction/order/table')
            </div>
        </div>
    </div>
</div>

@endsection