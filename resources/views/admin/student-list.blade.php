@extends('admin.layout.frame')

@section('title', 'Admin student list')

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
                    <h5 class="text-uppercase">STUDENT LIST</h5>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-3">

            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="/student/add" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add
                    Student</a>
            </div>
        </div>
        <div class="content-page">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped custom-table" id="datatable">
                        <thead>
                        <tr>
                            <th style="min-width:70px;">Student ID</th>
                            <th style="min-width:70px;">Student Name</th>
                            <th style="min-width:70px;">Major</th>
                            <th style="min-width:70px;">Batch</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->major }}</td>
                            <td>{{ $student->batch }}</td>

                            <td class="text-right">
{{--                                <a th:href="@{'assignCourse/'+ ${student.id}}" class="btn btn-primary btn-sm mb-1">--}}
{{--                                    <i class="fa fa-plus-square" aria-hidden="true"></i>--}}
{{--                                </a>&nbsp;&nbsp;&nbsp;--}}
                                <a href="{{ route('admin_get_student_detail', ['student_id'=>$student->id]) }}" class="btn btn-primary btn-sm mb-1">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;
{{--                                <a th:href="@{'edit/' + ${student.id}}" class="btn btn-primary btn-sm mb-1">--}}
{{--                                    <i class="fa fa-pencil" aria-hidden="true"></i>--}}
{{--                                </a>&nbsp;&nbsp;&nbsp;--}}
{{--                                <a th:href="@{'delete/' + ${student.id}}" class="btn btn-danger btn-sm mb-1 btn-delete">--}}
{{--                                    <i class="fa fa-trash" aria-hidden="true"></i>--}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
