@extends('layouts.backend')

@section('title')
User
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="" class="btn btn-success">
                        <i class="fa fa-plus" aria-hidden="true"></i> User
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    
                    <tbody></tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
       $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
       });
    });
 </script>
@endsection