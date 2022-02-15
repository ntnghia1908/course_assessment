@extends('admin.layout.frame')

@section('title', 'Admin Course Detail')

@section('main')

<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <h5 class="text-uppercase">Course Information</h5>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <ul class="list-inline breadcrumb float-right">
                    <li class="list-inline-item"><a href="/course/all">Course list</a></li>
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
                                        <h4>Course General Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Course ID</b>
                                                <a href="#" class="float-right">{{ $course->id }}</a>
                                            </li>
                                            <li class="list-group-item"><b>Course Title</b>
                                                <a href="#" class="float-right">{{ $course->name }}</a>
                                            </li>
                                            <li class="list-group-item"><b>Course Level</b>
                                                <a href="#"
                                                   class="float-right">{{ $course->courseLevel->level }}</a>
                                            </li>
                                            <li class="list-group-item"><b> Theory Credit</b>
                                                <a href="#" class="float-right">{{ $course->credit_theory }}</a>
                                            </li>
                                            <li class="list-group-item"><b> Lab Credit</b>
                                                <a href="#" class="float-right">{{ $course->credit_lab }} </a>
                                            </li>
                                            <li class="list-group-item"><b>Course Description</b>
                                                <a href="#" class="float-right">{{ $course->description }}</a>
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
                                                <li class="nav-item"><a href="#" class="nav-link active show">Opened
                                                        classes</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table"
                                                               id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">CourseName</th>
{{--                                                                <th style="min-width:50px;">Instructor</th>--}}
                                                                <th style="min-width:50px;">Group</th>
                                                                <th style="min-width:50px;">Semester</th>
                                                                <th style="min-width:50px;">Year</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($classSessions as $classSession)
                                                                <tr>
                                                                    <td>
                                                                        <a href="#">{{ $classSession->course->name }}</a>
                                                                    </td>
{{--                                                                    <td>{{ $classSession->instructor->degree}} {{ $classSession->instructor->name}}</td>--}}
                                                                    <td>{{ $classSession->group_theory }}</td>
                                                                    <td>{{ $classSession->semester }}</td>
                                                                    <td>{{ $classSession->academic_year }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav customtab">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link active show">Assessment Tools</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('admin_get_edit_courseAssessmentTool', ['courseId'=>$course->id]) }}"
                                                       class="nav-link active show">Edit Abet Mapping
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="assessment-tool" class="biography">
                                                        <table class="table table-striped custom-table"
                                                               id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">Description</th>
                                                                @foreach($courseAssessment as $ca)
                                                                    <th>{{ $ca->assessment->type }}
                                                                        : {{ $ca->percentage }} %
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($loList as $lo)
                                                                <tr id="{{ $lo->id }} ">
                                                                    <td>{{ $lo->description }}</td>
                                                                    @foreach($courseAssessment as $ca)
                                                                        @if( isset($newAssessmentTool[$lo->id][$ca->assessment_id]) )
                                                                            <td id="{{ $ca->id }}">
                                                                            {{$newAssessmentTool[$lo->id][$ca->assessment_id]}}
                                                                            </td>
                                                                        @else
                                                                            <td>0.0</td>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <!-- Nav tabs -->
                                            <ul class="nav customtab">
                                                <li class="nav-item"><a href="#" class="nav-link active show">ABET
                                                        mapping table</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table"
                                                               id="abet-table">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">LearningOutcome</th>
                                                                @for($i=1; $i<7; $i++) <th>{{ $i }}</th >@endfor
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($loList as $lo)
                                                            <tr id="{{ $lo->id }}">
                                                                <td>{{ $lo->description }}</td>
                                                                @for($i=1; $i<7; $i++)
                                                                    @if( isset($abetMapping[$lo->id][$i]) )
                                                                        <td>{{ $abetMapping[$lo->id][$i] }}</td>
                                                                    @else
                                                                        <td>0.0</td>
                                                                    @endif
                                                                @endfor
                                                            </tr>
                                                            @endforeach
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
@stop
@section('javascript')
    <script>
        var test = [[${jsonTest}]]
        console.log(test)
    </script>
@stop
