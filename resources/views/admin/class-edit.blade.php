@extends('admin.layout.frame')

@section('title', 'Admin Class Edit')

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
                    @if(isset($classSession))
                        <h5 class="text-uppercase">Update class {{ $classSession->course->name }}</h5>
                        <h5>Semester {{ $classSession->semester }} - {{ $classSession->academic_year }}</h5>
                    @else
                        <h5 class="text-uppercase">Add new Class</h5>
                    @endif
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <ul class="list-inline breadcrumb float-right">
                        <li class="list-inline-item"><a href="/classSession/all">Class list</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="page-title">Basic Information</div>
                                </div>
                            </div>
                        </div>
                            <form method="post" action=" {{isset($classSession) ? route('admin_edit_class', ['id'=>$classSession->id]) : route('admin_add_class')}}">
                                {{ csrf_field() }}
                                @isset($classSession)
                                    <input type="hidden" name="id" value="{{ $classSession->id }}">
                                @endisset

                                <div class="card-body">
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
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                @if(!isset($classSession))
                                            <div class="form-group custom-mt-form-group">
                                                <select id="course_id" name="course_id">
                                                    @foreach($courseList as $course)
                                                        <option value="{{$course->id}}">{{ $course->name }}</option>
                                                    @endforeach
                                                        <label for="course_id" class="control-label">Course Name</label>
                                                </select>
                                                <label class="control-label">Course<span
                                                        class="text-red">*</span></label><i
                                                    class="bar"></i>
                                            </div>
                                            @endif
                                            <div class="form-group custom-mt-form-group">
                                                <select id="instructor_name" name="instructor_name">
                                                    @foreach($instructorList as $instructor)
                                                    <option value="{{isset($classSession) ? $classSession->instructor_id : $instructor->id }}">
                                                        {{isset($classSession) ? $classSession->instructor->name : $instructor->name }}
                                                    </option>
                                                    @endforeach
                                                    <label for="instructor_name" class="control-label">instructor Name</label>
                                                </select>
                                                <label class="control-label">Instructor<span
                                                        class="text-red">*</span></label><i class="bar"></i>
                                            </div>
                                            <div class="form-group custom-mt-form-group">
                                                <input type="number" id="group_theory" name="group_theory"
                                                       value="{{isset($classSession) ? $classSession->group_theory : '' }}" required/>
                                                <label for="group_theory" id="group_theory" class="control-label">Group Theory <span
                                                        class="text-red">*</span></label><i class="bar"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group custom-mt-form-group">
                                                <select id="semester" name="semester">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <label for="semester" class="control-label">Semester <span
                                                        class="text-red">*</span></label><i
                                                    class="bar"></i>
                                            </div>
                                            <div class="form-group custom-mt-form-group">
                                                <input type="text" id="academic_year" name="academic_year"
                                                       value="{{ isset($classSession) ? $classSession->academic_year: '' }}" required/>
                                                <label for="academic_year" class="control-label">
                                                    Academic Yer (Format example: 2020-2021)<span
                                                        class="text-red">*</span></label><i class="bar"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group text-center custom-mt-form-group">
                                                <button class="btn btn-primary mr-2" type="submit">Submit</button>
                                                <button class="btn btn-secondary" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('javascript')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        let real_data = {{$courseNames}};
        $(document).ready(function () {
            $("#course_name").autocomplete({
                minLength: 1,
                source: real_data
            })
        });
    </script>
@stop
