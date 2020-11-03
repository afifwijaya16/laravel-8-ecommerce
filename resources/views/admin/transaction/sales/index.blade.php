@extends('template_backend/home')
@section('sub-breadcrumb', 'Sales')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Sales
            </div>
            <div class="card-body">
                @include('admin/transaction/sales/table')
            </div>
        </div>
    </div>
</div>

@endsection