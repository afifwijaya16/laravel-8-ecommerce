@extends('template_backend/home')
@section('sub-breadcrumb', 'Category')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Category
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-xs btn-info float-right" data-toggle="modal"
                    data-target="#modal-tambah" data-backdrop="static" data-keyboard="false">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
            <div class="card-body">
                @include('admin/category/table')
            </div>
        </div>
    </div>
</div>

@include('admin/category/tambah')
@include('admin/category/edit')
@include('admin/category/javascript')
@endsection