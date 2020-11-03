<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Product</th>
                <th width="10%">Category</th>
                <th width="20%">Thumbnail</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">{{ $hasil->category->name }}</td>
                <td class="text-center">
                    <a href="{{ asset($hasil->image) }}" target="_blank">
                        <img src="{{ asset($hasil->image) }}" class="rounded" width="55" height="55"  alt="{{ $hasil->name }}">
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{ route('product.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('product.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" name="delete" type="submit"
                            onclick="deleteFunction({{ $hasil->id}})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</div>


