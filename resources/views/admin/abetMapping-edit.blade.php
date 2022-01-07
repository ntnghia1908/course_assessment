@extends('admin.layout.frame')

@section('title', 'Admin edit abet mapping')

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
                    <h5 class="text-uppercase">Class Information</h5>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <ul class="list-inline breadcrumb float-right">
                        <li class="list-inline-item"><a href="{{ route('admin_get_classes') }}">Class list</a></li>
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
                                            <h4>Class General Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Course Title</b>
                                                    <a href="{{ route('admin_get_course_detail', [ 'id' => $class->course->id]) }}"
                                                       class="float-right">
                                                        {{ $class->course->id }} - {{ $class->course->name }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Course Level</b>
                                                    <a href="#" class="float-right">
                                                        {{ $class->course->courseLevel->level }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Credit</b>
                                                    <a href="#" class="float-right">
                                                        {{ $class->course->credit_theory }} (theory) {{ $class->course->credit_lab }} (lab)
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Instructor </b>
                                                    <a href= {{route('admin_get_lecturer_detail', ['id'=>$class->instructor->id])}}
                                                        class="float-right">{{ $class->instructor->name }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Group</b>
                                                    <a href="#" class="float-right"> {{ $class->group_theory }} </a>
                                                </li>
                                                <li class="list-group-item"><b>Semester - Academic Year</b>
                                                    <a href="#" class="float-right">
                                                        {{ $class->semester }} - {{ $class->academic_year }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-me-profile mt-4">

                                </div>
                                <div class="aboutme-profile mt-4">
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                        <!-- Nav tabs -->
                                        <ul class="nav customtab">
                                            <li class="nav-item"><a href="#" class="nav-link active show">ABET
                                                    mapping table</a></li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin_get_edit_abetMapping', ['classId'=>$class->id]) }}"
                                                   class="nav-link active show">Edit Abet Mapping
                                                </a>
                                            </li>
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
                                                                ><td>{{ $lo->description }}</td>
                                                                @for($i=1; $i<7; $i++)
                                                                    @if( isset($abetMapping[$lo->id][$i]) )
                                                                        <td>
                                                                            <input style="width: 50px" id="{{$lo}}-{{$i}}" type="number" max="100" min="0" value="{{ $abetMapping[$lo->id][$i] }}">
                                                                        </td>
                                                                    @else
                                                                        <td>0</td>
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
    // const elements = document.querySelectorAll("#my-form input[type=number]");

    const elements = document.querySelectorAll("#assessment-tool input[id^=cell]");
    elements.forEach ( element => {
         clo_id = element.id.split('-')[1];
         slo_id = element.id.split('-')[2];
    });
</script>
@stop

