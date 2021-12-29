<!DOCTYPE html>
<html>


<!-- Mirrored from dreamguys.co.in/preadmin/school/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 14:49:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('light/assets/img/favicon.png')}}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('light/assets/css/style.css')}}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
@yield('stylesheet')
<body>
    <div class="main-wrapper">
		@include('admin.layout.header')
		@include('admin.layout.sidebar')
        <div class="page-wrapper"> <!-- content -->
		@yield('main')
		</div>
	</div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="{{asset('light/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('light/assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('light/assets/plugins/morris/morris.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/plugins/raphael/raphael-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('light/assets/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/jquery.fullcalendar.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('light/assets/js/app.js')}}"></script>
    <script>
        $(function(){
            $('#datatable').DataTable({
                "searching": true,
                "iDisplayLength": 50,
            })
        })
    </script>
	@yield('javascript')
</body>
<!-- Mirrored from dreamguys.co.in/preadmin/school/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 14:49:43 GMT -->
</html>
