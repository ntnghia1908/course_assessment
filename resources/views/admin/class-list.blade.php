@extends('admin.layout.frame')

@section('title', 'Admin Class List')

@section('stylesheet')
    <style>
        #datatable {
            margin-top: 0px !important;
        }
    </style>
@stop

@section('main')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <h5 class="text-uppercase">Class list</h5>
                </div>
{{--                <div class="col-lg-5 col-md-12 col-sm-12 col-12">--}}
{{--                    <ul class="list-inline breadcrumb float-right">--}}
{{--                        <li class="list-inline-item"><a href="{{route('admin_dashboard')}}">Home</a></li>--}}
{{--                        <li class="list-inline-item"><a href="{{route('admin_get_courses')}}">Courses</a></li>--}}
{{--                        <li class="list-inline-item"> Course list</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-3">

            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ route('admin_get_add_class') }}" class="btn btn-primary float-right btn-rounded">
                    <i class="fa fa-plus"></i> Add Classes</a>
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
                    <table class="table table-striped custom-table" id="datatable">
                        <thead>
                        <tr>
                            <!-- <th style="min-width:70px;">Instructor </th> -->
                            <th style="min-width:50px;">Course Name</th>
                            <th style="min-width:50px;">Group</th>
                            <th style="min-width:50px;">Semester</th>
                            <th style="min-width:50px;">Academic Year</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $classes as $cl )
                            <tr>
                                <td>{{ $cl->course->name }} </td>
                                <td>{{ $cl->group_theory}}</td>
                                <td>{{ $cl->semester }}</td>
                                <td>{{ $cl->academic_year }}</td>
                                <td class="text-right" >
                                <a href="{{ route('admin_get_class_detail', [ 'id'=>$cl->id ]) }}"
                                   class="btn btn-primary btn-sm mb-1"><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('admin_get_edit_class', ['id' => $cl->id]) }}" class="btn btn-primary btn-sm mb-1">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <button type="submit" data-toggle="modal" data-id="{{ $cl->id }}" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1 btn-delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
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
                    <h4 class="modal-title">Delete Course</h4>
                </div>
                {{--                <form action="{{ route('admin_delete_course') }}" method="post">--}}
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="course_id" name="course_id">
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
                $('#course_id').val($(this).data('id'));
            });
        })
    </script>
@stop
