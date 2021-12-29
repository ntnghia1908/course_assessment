@extends('admin.layout.frame')

@section('title', 'Admin Dashboard')

@section('stylesheet')
<style>
    .table.dataTable {
        margin-top: 0px !important;
    }
</style>
@stop

@section('main')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                <div class="dash-widget dash-widget5">
                    <span class="dash-widget-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{count($lecturers)}}</h3>
                        <span>Lecturers</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="content-page">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-title mb-2">
                                All Lecturers
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped custom-table datatable" >
                                    <thead>
                                    <tr>
                                        <th style="min-width:50px;">Name </th>
                                        <th style="min-width:74px;">Email</th>
{{--                                        <th style="min-width:50px;">Phone</th>--}}
{{--                                        <th style="min-width:50px;">Address</th>--}}
{{--                                        <th style="min-width:90px;">Date of Birth</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $lecturers as $lecturer)
                                        <tr>
{{--                                            <td>--}}
{{--                                                <h2><a href="{{ route('admin-get-user-detail', ['id' => $lecturer->id]) }}" class="avatar text-white">{{ $lecturer->name[0]}}</a></h2> <br>--}}
{{--                                                <h2><a href="{{ route('admin-get-user-detail', ['id' => $lecturer->id]) }}">{{ ucfirst($lecturer->name) }}</a></h2>--}}
{{--                                            </td>--}}
                                            <td>{{$lecturer->degree}}.{{ $lecturer->name }}</td>
                                            <td>{{ $lecturer->email }}</td>
{{--                                            <td>{{ $lecturer->address }}</td>--}}
{{--                                            <td>{{ $lecturer->date_of_birth }}</td>--}}
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
@stop

@section('javascript')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
@stop
