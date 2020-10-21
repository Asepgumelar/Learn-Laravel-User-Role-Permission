@extends('layouts.backend')

@section('title')
Role
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
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
                        <i class="fa fa-plus" aria-hidden="true"></i> Role
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="{{ route('role-store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" class="form-control"
                                                placeholder="Enter Name" aria-describedby="helpId">
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
                    <table id="dtTableUser" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="visibilty: hidden">ID</th>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
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
            ajax        : "{{ route('role-getDataTable') }}",
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
                    data      : 'slug',
                    name      : 'slug',
                    searchable: true },
                {
                    data      : 'created_at',
                    name      : 'created_at',
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
                    sortable: false,
                    orderable: false,
                    className: "text-center",
                    width: "400px" },
            ]
       });
    });

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
                    url: '{{ route('user-delete') }}',
                    data: {
                        id: idx
                    },
                    success: function (data) {
                        Swal.fire({
                            type:   'success',
                            title:  'Success',
                            icon:   'success',
                            text:   "You has been delete data",
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
