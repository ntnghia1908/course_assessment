@extends('admin.layout.frame')

@section('title', 'Admin Lecture List')

@section('stylesheet')
    <style>
        .table.dataTable {
            margin-top: 0px !important;
        }
    </style>
@stop

@section('main')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <h5 class="text-uppercase">INSTRUCTOR LIST</h5>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <ul class="list-inline breadcrumb float-right">
                    <li class="list-inline-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                    <li class="list-inline-item"><a href="{{ route('admin_get_lecturers') }}">Instructor</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-3">
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('admin_get_add_lecturer') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Instructor</a>
        </div>
    </div>
    <div class="content-page">
        <div class="row">
            <div class="col-md-12">
                @if ( Session::has('flag') )
                    <div class="alert alert-{{Session::get('flag')}} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('key') }}!</strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table table-striped custom-table table-bordered" id="datatable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Instructor Name</th>
                        <th>Email</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lecturers as $lecturer)
                        <tr id="{{ $lecturer->id }}">
                            <td>{{ $lecturer->id }}</td>
                            <td>{{ $lecturer->degree }} {{$lecturer->name}}</td>
                            <td>{{ $lecturer->email }}</td>

                            <td class="text-right">
                                <a href="{{ route('admin_get_lecturer_detail', [ 'id'=>$lecturer->id ]) }}"
                                   class="btn btn-primary btn-sm mb-1"><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('admin_get_edit_lecturer', [ 'id'=>$lecturer->id ]) }}"
                                   class="btn btn-primary btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                                <button type="submit" data-toggle="modal" data-id="{{ $lecturer->id }}" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1 btn-delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="delete_employee" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Lecturer</h4>
            </div>
            <form action="{{ route('admin_delete_lecturer') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="lecturer_id" name="lecturer_id">
                <div class="modal-body card-box">
                    <p>Are you sure want to delete this?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('javascript')
    <script type="text/javascript" src="{{asset('light/assets/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(function(){
            $('.btn-delete').on('click', function(){
                console.log($(this).data('id'));
                $('input[id="lecturer_id"]').val($(this).data('id'));
            });
        })
    </script>
@stop
