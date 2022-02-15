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
                    <div class="">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12" id="about-profile-sidebar">
                                <div class="aboutme-profile mt-4">
                                    <div class="card">
                                        <div class="page-title">
                                            <h4>Class General Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Course Title</b>
                                                    <a href="{{ route('admin_get_course_detail', [ 'id' => $course->id]) }}"
                                                       class="float-right">
                                                        {{ $course->id }} - {{ $course->name }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Course Level</b>
                                                    <a href="#" class="float-right">
                                                        {{ $course->courseLevel->level }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Credit</b>
                                                    <a href="#" class="float-right">
                                                        {{ $course->credit_theory }} (theory) {{ $course->credit_lab }} (lab)
                                                    </a>
                                                </li>
{{--                                                <li class="list-group-item"><b>Instructor </b>--}}
{{--                                                    <a href= {{route('admin_get_lecturer_detail', ['id'=>$class->instructor->id])}}--}}
{{--                                                        class="float-right">{{ $class->instructor->name }}--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-group-item"><b>Group</b>--}}
{{--                                                    <a href="#" class="float-right"> {{ $class->group_theory }} </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="list-group-item"><b>Semester - Academic Year</b>--}}
{{--                                                    <a href="#" class="float-right">--}}
{{--                                                        {{ $class->semester }} - {{ $class->academic_year }}--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-me-profile mt-4">
                                    <button id="submitbnt" type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                                <div class="aboutme-profile mt-4">
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <div class="alert alert-{{Session::get('flag')}} alert-dismissible fade show" role="alert">
                                                    <strong>{{ Session::get('key') }}!</strong> {{ Session::get('message') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card">

                                                    <!-- Nav tabs -->
                                                    <ul class="nav customtab">
                                                        <li class="nav-item"><a href="#" class="nav-link active show">
                                                                AssessmentTools</a>
                                                        </li>
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active show">
                                                            <div class="biography">
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

                                                                    <tbody id="assessment-tool">
                                                                    @foreach($loList as $lo)
                                                                        <tr id="{{ $lo->id }} ">
                                                                            <td>{{ $lo->description }}</td>
                                                                            @foreach($courseAssessment as $ca)
                                                                                @if( isset($courseAssessmentTool[$lo->id][$ca->assessment_id]) )
                                                                                    <form>
                                                                                    <td>
                                                                                        <input id="cell-{{ $lo->id }}-{{$ca->assessment_id}}"
                                                                                               type="number" max="100" min="0" value="{{$courseAssessmentTool[$lo->id][$ca->assessment_id]}}" />
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        <input id="cell-{{ $lo->id }}-{{$ca->assessment_id}}"  max="100" min="0" type="number" value="0" />
                                                                                    </td>
                                                                                    </form>
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
        const elements = document.querySelectorAll("#assessment-tool input[id^='cell']");
        elements.forEach( element => element.addEventListener('input', () => {
            // const elements = document.querySelectorAll("#assessment-tool input[id^='cell']");
            let assessments = getAssessment(elements)

            const assessmentToolTable = document.querySelector("#assessment-tool");
            const row = document.createElement('tr');
            row.id= 'flag';

            var is_valid = true;
            let tdTap = `<td>total</td>`
            for( let slo_id in assessments) {
                let sumCol = 0;
                for (let clo_id in assessments[slo_id] ) {
                    sumCol += assessments[slo_id][clo_id];
                }
                assessments[slo_id]['sum'] = sumCol;
                if(sumCol !== 100) {
                    is_valid = false
                    tdTap += `<td class='bg-danger'>${sumCol}</td>`
                }
                else
                    tdTap += `<td>${sumCol}</td>`
            }

            row.innerHTML = tdTap;
            var flag = document.querySelector("#assessment-tool #flag");

            if(flag != null) {
                flag.remove()
            }

            if(is_valid) {
                document.querySelector('#submitbnt').disabled=false
            } else{
                document.querySelector('#submitbnt').disabled=true
            }

            assessmentToolTable.appendChild(row)

        }))

        document.querySelector('#submitbnt').addEventListener('click', function() {
            var assessments = getAssessment(elements)
            console.log(assessments)
            $.ajax({
                url: '/admin/assessmentToolCourse/edit',
                type: 'POST',
                data: {"assessmentTool": assessments, "_token": "{{ csrf_token() }}", "course_id": "{{ $course->id }}"  },
                dataType: 'json',
                success: function(res){
                    alert(res['message'])
                }
            });
        })
        function getAssessment(elements) {
            let assessments = {};
            elements.forEach ( element => {
                cloId= element.id.split('-')[1]; // row
                sloId= element.id.split('-')[2]; // col

                if(sloId in assessments)
                    assessments[sloId][cloId] = parseInt(element.value);
                else {
                    assessments[sloId] = {};
                    assessments[sloId][cloId] = parseInt(element.value) ;
                }
            });
            return assessments;
        }

    </script>
@stop

