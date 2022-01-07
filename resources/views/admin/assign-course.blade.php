<!DOCTYPE html>
<html xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout"
      xmlns:th="http://www.thymeleaf.org"
      layout:decorate="~{admin/layout/frame.html}">
<div layout:fragment="main">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <h5>Assign class for: </h5>
                    <h5 th:text="${student.id} +' - ' +${student.name}" class="text-uppercase"/>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <ul class="list-inline breadcrumb float-right">
                        <li class="list-inline-item"><a href="/student/all">Student list</a></li>
                        <li class="list-inline-item"><a th:href="@{'/student/view/'+ ${student.id}}">Student detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="content-page">
            <div class="row">
                <div class="col-md-12">
                    <!--                @if ( Session::has('flag') )-->
                    <!--                <div class="alert alert-{{Session::get('flag')}} alert-dismissible fade show" role="alert">-->
                    <!--                    <strong>{{ Session::get('key') }}!</strong> {{ Session::get('message') }}-->
                    <!--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
                    <!--                        <span aria-hidden="true">&times;</span>-->
                    <!--                    </button>-->
                    <!--                </div>-->
                    <!--                @endif-->
                    <table class="table table-striped custom-table table-bordered" id="datatable">
                        <thead>
                        <tr>


                            <th>Instructor</th>
                            <th>Course</th>
                            <th>Group</th>
                            <th>Semester</th>
                            <th>Academic Year</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr th:each="class : ${classes}">
                            <td th:text="${class.instructorId.name}">Name</td>
                            <td th:text="${class.course.name}">Id</td>
                            <td th:text="${class.groupTheory}">Group</td>
                            <td th:text="${class.semester}">Semester</td>
                            <td th:text="${class.academicYear}">aYear</td>

                            <td class="text-right">
                                <a th:href="@{'/result/assignCourse/'+ ${class.id} +'/'+ ${student.id}}" class="btn btn-primary btn-sm mb-1">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</html>