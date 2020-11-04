<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Code Order</th>
                <th width="10%">Name</th>
                <th width="20%">Total Price</th>
                <th width="10%">Status</th>
                <th width="10%">Aksi</th>
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
                    @if ($hasil->status == 1)
                        <span class="badge badge-danger">Unpaid</span>
                    @elseif ($hasil->status == 2) 
                        <span class="badge badge-success">Paid</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.order.show', $hasil->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
    </table>
</div>


