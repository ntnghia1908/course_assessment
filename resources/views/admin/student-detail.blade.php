@extends('admin.layout.frame')

@section('title', 'Admin student detail')

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
        <h5 class="text-uppercase">Student Detail</h5>
      </div>
      <div class="col-lg-5 col-md-12 col-sm-12 col-12">
        <ul class="list-inline breadcrumb float-right">
          <li class="list-inline-item"><a href="/student/all">Student list</a></li>
{{--          <li class="list-inline-item"><a th:href="@{'/student/assignCourse/'+ ${student.id}}">Assign Course</a></li>--}}

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
                    <h4>About Student</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><b>StudentID</b><a href="#" class="float-right">{{ $student->id }}</a></li>
                      <li class="list-group-item"><b>Student Name</b><a href="#" class="float-right" >{{ $student->name }}</a></li>
                      <li class="list-group-item"><b>Major</b><a href="#" class="float-right" >{{ $student->major }}</a></li>
                      <li class="list-group-item"><b>Batch</b><a href="#" class="float-right" >{{ $student->batch }}</a></li>

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
                        <li class="nav-item"><a href="#" class="nav-link active show">Class Result</a></li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active show">
                          <div id="biography" class="biography">
                            <table class="table table-striped custom-table" id="datatable">
                              <thead>
                              <tr>
                                <th style="min-width:50px;">Course Name</th>
                                <th style="min-width:50px;">Instructor</th>
                                <th style="min-width:50px;">Group</th>
                                <th style="min-width:50px;">Semester</th>
                                <th style="min-width:50px;">Year</th>
                                <th style="min-width:50px;">GPA</th>
                                <th style="min-width:50px;">Avg ABET score</th>

                              </tr>
                              </thead>
                              <tbody>
                              @foreach($studentResults as $result)
                              <tr>
                                <td><a href="{{ route('admin_get_class_detail', ['id'=>$result->class_id]) }}">
                                        {{ $result->classSession->instructor->name }}</a></td>
                                  <td>{{ $result->classSession->instructor->name }}</td>
                                  <td>{{ $result->classSession->group_theory }}</td>
                                  <td>{{ $result->classSession->semester }}</td>
                                  <td>{{ $result->classSession->academic_year }}</td>
                                  <td>{{ $result->GPA }}</td>
                                  <td>{{ $result->abet_score }}</td>
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
