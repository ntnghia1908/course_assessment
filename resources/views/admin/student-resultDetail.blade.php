@extends('admin.layout.frame')

@section('title', 'Admin result detail')

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
                <h5 class="text-uppercase"> Student's result in class</h5>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <ul class="list-inline breadcrumb float-right">
{{--                    <li class="list-inline-item"><a href="{{route('get')}}">Home</a></li>--}}
                    <li class="list-inline-item"><a href="{{route('admin_get_classes')}}">Back to class</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="aboutprofile-sidebar">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="aboutme-profile mt-4">
                                <div class="card">
                                    <div class="page-title">
                                        <h4>General Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Course</b>
                                                <a href="{{route('admin_get_course_detail', ['id'=>$studentResult->classSession->course_id])}}"
                                                    class="float-right">
                                                    {{$studentResult->classSession->course_id}} - {{$studentResult->classSession->course->name}}
                                                </a>
                                            </li>
                                            <li class="list-group-item"><b>Student</b>
                                                <a>
                                                   {{$studentResult->student_id}} - {{$studentResult->student->name}}</a>
                                            </li>
                                            <li class="list-group-item"><b> Instructor</b>
                                                <a href="{{ route('admin_get_lecturer_detail', ['id'=>$studentResult->classSession->instructor_id]) }}"
                                                   class="float-right">
                                                    {{ $studentResult->classSession->instructor->degress }} {{ $studentResult->classSession->instructor->name }}
                                                </a>
                                            </li>
                                            <li class="list-group-item"><b>Semester - Academic Year</b>
                                                <a href="#" class="float-right">
                                                    Semester {{ $studentResult->classSession->semester }} - {{$studentResult->classSession->academic_year}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="aboutme-profile mt-4">
                                <div class="card">
                                    <div class="page-title">
                                        <h4>RESULT</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Course Outcome Score (GPA)</b>
                                                <a href="#" class="float-right">{{ $studentResult->GPA }}</a>
                                            </li>
                                            <li class="list-group-item"><b>Student Outcome (%)</b>
                                                <a href="#" class="float-right">{{ $studentResult->abet_score }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav customtab">
                                                <li class="nav-item"><a href="#" class="nav-link active show">Course Outcome Score</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table" id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">In-class Score</th>
                                                                <th style="min-width:50px;">Midterm Score</th>
                                                                <th style="min-width:50px;">Final Score</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{$studentResult->in_class_score}}</td>
                                                                <td>{{$studentResult->mid_score}}</td>
                                                                <td>{{$studentResult->final_score}}</td>
                                                            </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav customtab">
                                                <li class="nav-item"><a href="#" class="nav-link active show">Student Outcome Score (%)</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table" id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;"> Criteria 1</th>
                                                                <th style="min-width:50px;"> Criteria 2</th>
                                                                <th style="min-width:50px;"> Criteria 3</th>
                                                                <th style="min-width:50px;"> Criteria 4</th>
                                                                <th style="min-width:50px;"> Criteria 5</th>
                                                                <th style="min-width:50px;"> Criteria 6<th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th style="min-width:50px;">{{$studentResult->abet_1}}</th>
                                                                <th style="min-width:50px;">{{$studentResult->abet_2}}</th>
                                                                <th style="min-width:50px;">{{$studentResult->abet_3}}</th>
                                                                <th style="min-width:50px;">{{$studentResult->abet_4}}</th>
                                                                <th style="min-width:50px;">{{$studentResult->abet_5}}</th>
                                                                <th style="min-width:50px;">{{$studentResult->abet_6}}</th>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
