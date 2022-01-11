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
                                                        {{ $class->course->credit_theory }}
                                                        (theory) {{ $class->course->credit_lab }} (lab)
                                                    </a>
                                                </li>
                                                <li class="list-group-item"><b>Instructor </b>
                                                    <a href={{route('admin_get_lecturer_detail', ['id'=>$class->instructor->id])}}
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
                                    <div class="about-me-profile mt-4">
                                        <button id="submitbnt" type="submit" class="btn btn-primary btn-block">Update
                                        </button>
                                    </div>
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
                                                            <table class="table table-striped custom-table">
                                                                <thead>
                                                                <tr>
                                                                    <th style="min-width:50px;">LearningOutcome</th>
                                                                    @for($i=1; $i<7; $i++)
                                                                        <th>{{ $i }}</th>@endfor
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="abet-mapping-table">
                                                                @foreach($loList as $lo)
                                                                    <tr id="{{$lo->id}}">
                                                                        <td>{{ $lo->description }}</td>
                                                                        @for($i=1; $i<7; $i++)
                                                                            @if( isset($abetMapping[$lo->id][$i]) )
                                                                                <td>
                                                                                    <input style="width: 50px"
                                                                                           id="cell-{{$lo->id}}-{{$i}}"
                                                                                           type="number" max="100"
                                                                                           min="0"
                                                                                           value="{{ $abetMapping[$lo->id][$i] }}">
                                                                                </td>
                                                                            @else
                                                                                <td>
                                                                                    <input style="width: 50px"
                                                                                           id="cell-{{$lo->id}}-{{$i}}"
                                                                                           type="number" max="100"
                                                                                           min="0" value="0" disabled>
                                                                                </td>
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
@endsection
@section('javascript')
    <script>
        const elements = document.querySelectorAll("#abet-mapping-table td input[id^='cell']");

        elements.forEach(element => element.addEventListener('input', () => {
            const assessments = getAbetMapping(elements)
            const assessmentToolTable = document.querySelector("#abet-mapping-table");
            let is_valid = true;

            for (let clo_id in assessments) {
                let sumRow = 0;
                for (let slo_id in assessments[clo_id]) {
                    sumRow += assessments[clo_id][slo_id];
                }
                console.log(sumRow);
                assessments[clo_id]['sum'] = sumRow;

                const tdTap = document.createElement('td');
                tdTap.className = 'flag';
                // row.id= 'flag';

                if (sumRow !== 100) {
                    is_valid = false
                    tdTap.classList.add('bg-danger');
                    tdTap.appendChild(document.createTextNode(sumRow));
                } else {
                    tdTap.appendChild(document.createTextNode(sumRow));
                }
                tdTap.class = 'flag';
                // const cloRow = document.querySelector("tr[id="+clo_id+"]");
                const cloRow = document.querySelector("tr[id='" + clo_id + "']");
                const flags = document.querySelectorAll("td[class='flag']");
                flags.forEach(e => {
                    e.remove();
                });
                cloRow.appendChild(tdTap);
            }

            if (is_valid) {
                document.querySelector('#submitbnt').disabled = false
            } else {
                document.querySelector('#submitbnt').disabled = true
            }

        }));

        function getAbetMapping(elements) {
            let assessments = {};
            elements.forEach(element => {
                cloId = element.id.split('-')[1]; // row
                sloId = element.id.split('-')[2]; // col
                // console.log(sloId)

                // DIFFERENT POINT FROM ASSESSMENT TOOL
                if (cloId in assessments)
                    assessments[cloId][sloId] = parseInt(element.value);
                else {
                    assessments[cloId] = {};
                    assessments[cloId][sloId] = parseInt(element.value);
                }
            });
            return assessments;
        }

        document.querySelector('#submitbnt').addEventListener('click', function () {
            var assessments = getAbetMapping(elements)
            // console.log(assessments)
            $.ajax({
                url: '/admin/assessment/edit',
                type: 'POST',
                data: {
                    "assessmentTool": assessments,
                    "_token": "{{ csrf_token() }}",
                    "class_id": {{ $class->id }}
                },
                dataType: 'json',
                success: function (res) {
                    alert(res['message'])
                }
            });
        })
    </script>
@endsection

