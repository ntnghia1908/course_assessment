@extends('admin.layout.frame')

@section('title', 'Admin Class Detail')

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
                                <div class="card">
                                    <div class="page-title">
{{--                                        <h4>Upload student in classes</h4>--}}
                                    </div>
{{--                                    <div class="card-body">--}}
{{--                                        <form action= "{{ route('admin_result_upload', ['id'=>$class->id]) }}"--}}
{{--                                              enctype="multipart/form-data" method="post">--}}
{{--                                            @csrf--}}
{{--                                            <input type="file" name="student_file" required class="form-control2">--}}
{{--                                            <br>--}}
{{--                                            <div class="form-group custom-mt-form-group">--}}
{{--                                                <button class="btn btn-primary mr-2" type="submit">Import students--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="card">
                                    <div class="page-title">
                                        <h4>File format (excel)</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Fields</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Student ID <span class="text-red">*</span></td>
                                                <td>Ex: ITITIU2001</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="aboutme-profile mt-4">
                                <div class="card">
                                    <div class="page-title">
                                        <h4>Upload student results</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('admin_result_upload_score', ['class_id'=>$class->id]) }}"
                                              enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input  type="file" name="score_file" required class="form-control2">
                                            <br>
                                            <div class="form-group custom-mt-form-group">
                                                <button class="btn btn-primary mr-2" type="submit">Import student
                                                    results
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="page-title">
                                        <h4>File format (excel)</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Fields</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Student ID <span class="text-red">*</span></td>
                                                <td>Ex: ITITIU2001</td>
                                            </tr>
                                            <tr>
                                                <td>Assigment Score <span class="text-red">*</span></td>
                                                <td>Ex: 90</td>
                                            </tr>
                                            <tr>
                                                <td>Midterm Score <span class="text-red">*</span></td>
                                                <td>Ex: 90</td>
                                            </tr>
                                            <tr>
                                                <td>Final Score <span class="text-red">*</span></td>
                                                <td>Ex: 80</td>
                                            </tr>
                                            </tbody>
                                        </table>
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
                                            <li class="nav-item"><a href="#" class="nav-link active show">Class Result Summary</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active show">
                                                <div id="biography" class="biography">
                                                    <table class="table table-striped custom-table" id="datatable">
                                                        <thead>
                                                        <tr>
                                                            <th style="min-width:50px;">ABET criteria</th>
                                                            <th style="min-width:50px;">Average score</th>
                                                            <th style="min-width:50px;"> % Pass</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($resultSummary as $result)
                                                        <tr>
                                                            <td> {{ $result[0] }}</td>
                                                            <td> {{ $result[2] }}</td>
                                                            <td> {{ $result[1] }}%</td>
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
                                                <li class="nav-item"><a href="#" class="nav-link active show">Student
                                                        list</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table" id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">Student ID</th>
                                                                <th style="min-width:50px;">Student Name</th>
                                                                <th style="min-width:50px;">In-class Score</th>
                                                                <th style="min-width:50px;">Midterm Score</th>
                                                                <th style="min-width:50px;">Final Score</th>
                                                                <th style="min-width:50px;">GPA</th>
                                                                <th style="min-width:50px;">Average ABET achieved (%)
                                                                </th>
                                                                <th style="min-width:50px;">Action</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($resultList as $result)
                                                            <tr>
                                                                <td>
                                                                <a href="{{ route('admin_get_result_detailForStudent',
                                                                    ['class_id'=>$result->class_id, 'student_id'=>$result->student_id]) }}">
                                                                    {{$result->student_id}}
                                                                </a>
                                                                </td>
                                                                <td>{{ $result->student->name }}</td>
                                                                <td>{{ $result->in_class_score }}</td>
                                                                <td>{{ $result->mid_score }}</td>
                                                                <td>{{ $result->final_score }}</td>
                                                                <td>{{ $result->GPA }}</td>
                                                                <td>{{ $result->abet_score }}</td>
                                                                <td class="text-right">
                                                                    <a class="btn btn-primary btn-sm mb-1"
                                                                        href= {{ route('admin_get_result_detailForStudent',
                                                                        ['class_id'=>$result->class_id, 'student_id'=>$result->student_id]) }}>
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>&nbsp;&nbsp;&nbsp;
                                                                    <a
                                                                    class="btn btn-danger btn-sm mb-1 btn-delete"
                                                                    href={{route('admin_delete_student_from_class',
                                                                    ['class_id'=>$result->class_id, 'student_id'=>$result->student_id]) }}>
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a>&nbsp;&nbsp;&nbsp;
                                                                </td>
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
                                                <li class="nav-item"><a href="#" class="nav-link active show">COURSE ASSESSMENT</a></li>
                                                <li class="nav-item">
                                                    <a class="nav-link active show"
                                                        href= {{route('admin_get_edit_courseAssessment', ['classId'=>$class->id])}}>
                                                        Edit Course Assessment
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="assessment-table" class="biography">
                                                        <table class="table table-striped custom-table">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:50px;">Assessment Type</th>
                                                                <th style="min-width:50px;">Percentage</th>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($courseAssessment as $assessment)
                                                            <tr>
                                                                <td>{{ $assessment->assessment->type }}</td>
                                                                <td>{{ $assessment->percentage }}</td>
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
                                                <li class="nav-item"><a href="#" class="nav-link active show">
                                                        AssessmentTools</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active show"
                                                        href={{route('admin_get_edit_assessmentTool', ['classId'=>$class->id])}}>
                                                        Edit Assessment Tool
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div class="biography">
                                                        <table class="table table-striped custom-table">
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

                                                            <tbody id="assessment-tool">
                                                            @foreach($loList as $lo)
                                                                <tr id="{{ $lo->id }} ">
                                                                    <td>{{ $lo->description }}</td>
                                                                    @foreach($courseAssessment as $ca)
                                                                        @if( isset($classAssessmentTool[$lo->id][$ca->assessment_id]) )
                                                                            <td id="cell-{{ $lo->id }}-{{ $ca->assessment_id }}">
                                                                                <b>{{$classAssessmentTool[$lo->id][$ca->assessment_id]}}</b>
                                                                            </td>
                                                                        @else
                                                                            <td id="cell-{{ $lo->id }}-{{ $ca->assessment_id }}">0.0</td>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
{{--                                                                <tr id="flag"> </tr>--}}
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
                                                                    <td>{{ $lo->description }}</td>
                                                                    @for($i=1; $i<7; $i++)
                                                                        @if( isset($abetMapping[$lo->id][$i]) )
                                                                            <td>{{ $abetMapping[$lo->id][$i] }}</td>
                                                                        @else
                                                                            <td></td>
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
    const elements = document.querySelectorAll("#assessment-tool td[id^='cell']");
    var assessments = {};
    elements.forEach ( element => {
        cloId= element.id.split('-')[1]; // row
        sloId= element.id.split('-')[2]; // col

        if(sloId in assessments)
            assessments[sloId][cloId] = parseInt(element.innerText);
        else {
            assessments[sloId] = {};
            assessments[sloId][cloId] = parseInt(element.innerText) ;
        }
    });

    const assessmentToolTable = document.querySelector("#assessment-tool");
    const row = document.createElement('tr');
    let tdTap = `<td>total</td>`
    for( let slo_id in assessments) {
        let sumCol = 0;
        for (let clo_id in assessments[slo_id] ) {
            sumCol += assessments[slo_id][clo_id];
        }
        assessments[slo_id]['sum'] = sumCol;
        tdTap += `<td>${sumCol}</td>`
    }

    row.innerHTML = tdTap;
    assessmentToolTable.appendChild(row)
</script>
@stop

