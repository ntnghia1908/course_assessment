<div class="sidebar" id="sidebar"> <!-- sidebar -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="">
                    <a href="{{ route('admin_dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Classes</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin_get_classes') }}">All class</a></li>
                        <li><a href="{{ route('admin_get_add_class') }}">Add class</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Lecturers</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin_get_lecturers', ['id' => \App\Role::LECTURER]) }}">All Lecturers</a></li>
                        <li><a href="{{ route('admin_get_add_lecturer', ['id' => \App\Role::LECTURER]) }}">Add Lecturer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>Students</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin_get_students') }}">All Students</a></li>
{{--                        <li><a href="{{ route('admin_get_add_student_page') }}">Add Student</a></li>--}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Courses</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin_get_courses') }}">All Courses</a></li>
{{--                        <li><a href="{{ route('admin_get_add_course') }}">Add Course</a></li>--}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
