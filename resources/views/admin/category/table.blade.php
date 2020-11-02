<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="50%">Category</th>
                <th width="20%">Category</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">
                    <a href="{{ asset($hasil->image) }}" target="_blank">
                        <img src="{{ asset($hasil->image) }}" class="rounded" width="55" height="55"  alt="{{ $hasil->name }}">
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{ route('category.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        <a href=""></a>
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-warning" id="form-edit-{{ $hasil->id}}"
                            onclick="editFunction({{ $hasil->id}})" data-id="{{ $hasil->id }}"
                            data-Name="{{ $hasil->name }}" data-toggle="modal" data-target="#modal-edit"
                            data-backdrop="static" data-keyboard="false">
                            <i class="fa fa-edit"></i>
                        </button>
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