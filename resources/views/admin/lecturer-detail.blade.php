@extends('admin.layout.frame')

@section('title', 'Lecturer detail')

@section('main')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <h5 class="text-uppercase"> Instructor detail</h5>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <ul class="list-inline breadcrumb float-right">
                    <li class="list-inline-item"><a href="{{route('admin_get_lecturers')}}">Lecturer list</a></li>

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
                                        <h4>About Instructor</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Full name</b>
                                                <a href="#" class="float-right">{{ $lecturer->degree }} {{ $lecturer->name }}</a>
                                            </li>
                                            <li class="list-group-item"><b>Email</b>
                                                <a href="#" class="float-right">{{ $lecturer->email }}</a>
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
                                                <li class="nav-item"><a href="#" class="nav-link active show">Teaching Classes</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active show">
                                                    <div id="biography" class="biography">
                                                        <table class="table table-striped custom-table" id="datatable">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:70px;">Course ID </th>
                                                                <th style="min-width:50px;">Course Name</th>
                                                                <th style="min-width:50px;">Group</th>
                                                                <th style="min-width:50px;">Semester</th>
                                                                <th style="min-width:50px;">Year</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($classSessions as $cl)
                                                            <tr>
                                                                <td>{{ $cl->course->id }}</td>
                                                                <td>{{ $cl->course->name }}</td>
                                                                <td>{{ $cl->group }}</td>
                                                                <td>{{ $cl->semester }}</td>
                                                                <td>{{ $cl->academic_year }}</td>
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
