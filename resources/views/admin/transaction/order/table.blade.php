<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Code Order</th>
                <th width="10%">Name</th>
                <th width="20%">Total Price</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->code_order }}</td>
                <td class="text-center">{{ $hasil->user->name }}</td>
                <td class="text-center">Rp. {{ number_format($hasil->total_price) }}</td>
                
                <td class="text-center">
                    {{-- <form action="{{ route('product.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('product.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" name="delete" type="submit"
                            onclick="deleteFunction({{ $hasil->id}})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
    </table>
</div>


