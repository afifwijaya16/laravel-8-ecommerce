@extends('template_backend/home')
@section('sub-breadcrumb', 'Product')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perbarui Data Product</h3>
            </div>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Product</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                            value="{{ $product->name }}" name="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id"
                            class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                            <option selected disabled>-- Pilih Category--</option>
                            @foreach ($category as $result)
                            <option value="{{ $result->id }}" @if ($product->category_id == $result->id) selected @endif >{{ $result->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Price Buy</label>
                                <input type="number" min="0" class="form-control form-control-sm @error('price_buy') is-invalid @enderror"
                                    value="{{ $product->price_buy }}" name="price_buy">
                                @error('price_buy')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" min="0" class="form-control form-control-sm @error('price') is-invalid @enderror"
                                    value="{{ $product->price }}" name="price">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" class="form-control form-control-sm @error('qty') is-invalid @enderror"
                                    name="qty" value="{{ $product->qty }}">
                                @error('qty')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Thumnail</label>
                                <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="textAreaEditor"
                            class="form-control form-control-sm @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label>Publish</label>
                        <select name="is_publish" class="form-control @error('is_publish') is-invalid @enderror">
                            <option disabled selected>--Choise Publish--</option>
                            <option value="1" @if ($product->is_publish == '1') {{ 'selected' }} @endif>Is Publish</option>
                            <option value="0" @if ($product->is_publish == '0') {{ 'selected' }} @endif>No Publish</option>
                        </select>
                        @error('is_publish')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ url()->previous() }}" class="btn btn-warning"> Kembali </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'textAreaEditor' );
</script>
@endsection
