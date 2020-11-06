@extends('layouts.backend')

@section('title')
User
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card bg-dark">
            <div class="card-header">
                <h3 class="card-title">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-check"></i> Success! {{ session('status') }}
                        </h4>
                    </div>
                    @endif
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-plus" aria-hidden="true"></i> User
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create User</h5>
                                </div>
                                <form action="{{ route('user-store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name"  class="form-control"
                                                placeholder="Enter Name" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email"  class="form-control"
                                                placeholder="Enter Address" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password"  class="form-control"
                                                placeholder="Enter Password" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Min 8 Character</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dtTableUser" class="table table-bordered table-hover table-sm table-striped">
                        <thead class="bg-gray-dark">
                            <tr class="text-center">
                                <th style="visibilty: hidden">ID</th>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Joined At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody></tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(function () {
        $("#dtTableUser").DataTable({
            responsive  : true,
            autoWidth   : false,
            processing  : true,
            lengthChange: true,
            serverSide  : true,
            ajax        : "{{ route('user-getDataTable') }}",
            columns     : [
                {
                    data      : 'id',
                    name      : 'id',
                    visible   : false,
                    searchable: false },
                {
                    data      : 'DT_RowIndex',
                    name      : 'DT_RowIndex',
                    orderable : false,
                    searchable: false },
                {
                    data      : 'name',
                    name      : 'name',
                    searchable: true },
                {
                    data      : 'email',
                    name      : 'email',
                    searchable: true },
                {
                    data      : 'active',
                    name      : 'active',
                    render: function (data, type, row) {
                        if (data == true) {
                            var checked = 'checked';
                        } else {
                            var checked = '';
                        }
                        return '<div class="custom-control custom-switch"><input type="checkbox" value="'+data+'" '+checked+' class="custom-control-input" id="switchActive'+row.id+'" onchange="funcActive('+row.id+')"><label class="custom-control-label" for="switchActive'+row.id+'"></label></div>';
                    }
                },
                {
                    data      : 'joined_at',
                    name      : 'joined_at',
                    searchable: false },
                {
                    data      : 'action',
                    name      : 'action',
                    orderable : false,
                    searchable: false},
            ],
            order: [
                [ 0, 'asc' ]
            ],
            pageLength: 10,
            columnDefs: [
                {
                    targets: 0,
                    sortable: false,
                    orderable: false },
                {
                    targets: 1,
                    sortable: false,
                    orderable: false,
                    className: "align-middle text-center" },
                {
                    targets: 2,
                    sortable: true,
                    orderable: true,
                    className: "align-middle" },
                {
                    targets: 3,
                    sortable: true,
                    orderable: true,
                    className: "align-middle" },
                {
                    targets: 4,
                    sortable: true,
                    orderable: true,
                    className: "align-middle text-center" },
                {
                    targets: 5,
                    sortable: true,
                    orderable: true,
                    className: "align-middle text-center" },
                {
                    targets: 6,
                    sortable: false,
                    orderable: false,
                    className: "text-center",
                    width: "400px" },
            ]
        });
    });


    function funcActive(idx) {
        // var status = $(this).prop('checked') === true ? 1 : 0;
        var status = 0;
        if ($('#switchActive' + idx).prop('checked') === true) {
            var status = 1;
        }
        console.log(status);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url : '{{ route('user-active') }}',
            data: {
                id: idx,
                active: status
            },
            success: function (data) {
                Swal.fire({
                    type : 'succes',
                    title: 'Success',
                    icon : 'success',
                    text : 'You has change user active/inactive'
                });

                $('#dtTableUser').DataTable().draw();
            }
        })
    }

    function deleteUser(idx) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url : '{{ route('user-delete') }}',
                    data: {
                        id: idx
                    },
                    success: function (data) {
                        Swal.fire({
                            type : 'success',
                            title: 'Success',
                            icon : 'success',
                            text : "You has been delete data"
                        });

                        $('#dtTableUser').DataTable().draw();
                    },
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    };
 </script>
@endsection
