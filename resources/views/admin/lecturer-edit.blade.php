<!DOCTYPE html>
@extends('admin.layout.frame')

@section('title', 'Lecturer detail')

@section('main')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    @if(isset($lecturers))
                        <h5 class="text-uppercase"> Update {{ $lecturer->degree }}.{{ $lecturer->name }}</h5>
                    @else
                        <h5 class="text-uppercase">Add new Instructor</h5>
                    @endif
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <ul class="list-inline breadcrumb float-right">
                        <li class="list-inline-item"><a href="{{ route('admin_get_lecturers') }}">Instructor list</a>
                        </li>
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

                        <form action="{{ isset($lecturer) ? route('admin_edit_lecturer') :
                            route('admin_add_lecturer') }}"  method="post">
                            {{ csrf_field() }}
                            @isset($lecturer)
                                <input type="hidden" name="id" value="{{ $lecturer->id }}">
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
                                        <div class="form-group custom-mt-form-group">
                                            <input id="name" type="text" name="name"
                                                   value="{{ isset($lecturer) ? $lecturer->name : '' }}" required/>
                                            <label for="name" class="control-label">Name <span class="text-red">*</span></label>
                                            <i class="bar"></i>
                                        </div>

                                        <div class="form-group custom-mt-form-group">
                                            <select id="degree" name="degree">
                                                <option value="Prof.Dr."> Prof.Dr</option>
                                                <option value="Assof.Dr.">Assof.Dr.</option>
                                                <option value="Dr."> PhD/Dr</option>
                                                <option value="MSc." selected>MSc.</option>
                                            </select>
                                            <label for="degree" class="control-label">Degree</label><i class="bar"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group custom-mt-form-group">
                                            <input id="email" type="email" name="email"
                                                   value="{{ isset($lecturer) ? $lecturer->email : '' }}" required/>
                                            <label for="email" class="control-label">Email <span
                                                    class="text-red">*</span></label><i
                                                class="bar"></i>
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
    </div>
@endsection
