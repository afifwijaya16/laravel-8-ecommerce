<script>
    function editFunction($id) {
        const formEdit      = 'form-edit-' + $id;
        var element         = document.getElementById(formEdit);
        var dataId          = element.getAttribute('data-id');
        var dataName       = element.getAttribute('data-Name');
        console.log(dataId);
        document.getElementById("EditInputId").value = dataId;
        document.getElementById("EditInputName").value = dataName;
    }

    function deleteFunction($id) {
        event.preventDefault();
        const form = 'form-delete-' + $id;
        Swal.fire({
            title: 'Apakah anda yakin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(form).submit();
            }
        }).catch((error) => {
            console.log(error);
        })
    }
</script>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif