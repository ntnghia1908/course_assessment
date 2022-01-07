<!DOCTYPE html>
<html xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout"
      xmlns:th="http://www.thymeleaf.org"
      layout:decorate="~{admin/layout/frame.html}">
<div class="content container-fluid" layout:fragment="main">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <div th:if="${student.id != null}">
                    <h5 th:text="'Update '+${student.name}" class="text-uppercase"></h5>
                </div>
                <div th:unless="${student.id !=null}">
                    <h5 class="text-uppercase">Add new Student</h5>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <ul class="list-inline breadcrumb float-right">
                    <li class="list-inline-item"><a href="/student/all">Student list</a></li>
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
                                <div class="page-title">Information</div>
                            </div>
                        </div>
                    </div>
                    <div th:if="${student.id} !=null">
                        <form method="post" th:action="@{'/student/update/' + ${student.id}}" th:object="${student}"
                              enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group custom-mt-form-group">
                                                <input type="text" th:field="*{name}" th:value="${student.name}" required/>
                                            <label class="control-label">Student Name <span
                                                    class="text-red">*</span></label><i class="bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group custom-mt-form-group">
                                            <select th:field="*{major}">
                                                <option value="Information Technology"> Information Technology</option>
                                                <option value="Data Science">Data Science</option>
                                                <option value="Twinning Program"> Twinning Program</option>
                                            </select>
                                            <label class="control-label">Major<span class="text-red">*</span></label><i
                                                class="bar"></i>
                                        </div>

                                        <div class="form-group custom-mt-form-group">
                                            <select th:field="*{batch}">
                                                <option th:each="i : ${#numbers.sequence(16,50)}"
                                                        th:value="${i}"
                                                        th:utext="${i}"/>
                                            </select>
                                            <label class="control-label">Batch <span class="text-red">*</span></label><i
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
                    <div th:unless="${student.id} !=null">
                        <form method="post" th:action="@{/student/save}" th:object="${student}"
                              enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group custom-mt-form-group">
                                            <input type="text" th:field="*{id}"  required/>
                                            <label class="control-label">Student ID <span
                                                    class="text-red">*</span></label><i class="bar"></i>
                                        </div>
                                        <div class="form-group custom-mt-form-group">
                                            <input type="text" th:field="*{name}"  required/>
                                            <label class="control-label">Student Name <span
                                                    class="text-red">*</span></label><i class="bar"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group custom-mt-form-group">
                                            <select th:field="*{major}">
                                                <option value="Information Technology"> Information Technology</option>
                                                <option value="Data Science">Data Science</option>
                                                <option value="Twinning Program"> Twinning Program</option>
                                            </select>
                                            <label class="control-label">Major<span class="text-red">*</span></label><i
                                                class="bar"></i>
                                        </div>

                                        <div class="form-group custom-mt-form-group">
                                            <select th:field="*{batch}">
                                                <option th:each="i : ${#numbers.sequence(16,50)}"
                                                        th:value="${i}"
                                                        th:utext="${i}"/>
                                            </select>
                                            <label class="control-label">Batch <span class="text-red">*</span></label><i
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
                        <div class="page-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="page-title">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="page-title">Import file</div>
                                                </div>
                                            </div>
                                        </div>
                                        <form th:action="@{/student/saveAuto}" enctype="multipart/form-data" method="post">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-group custom-mt-form-group">
                                                            <input type="file" name="file" required class="form-control-file">
                                                        </div>
                                                        <div class="form-group custom-mt-form-group">
                                                            <button class="btn btn-primary mr-2" type="submit">Import students</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group custom-mt-form-group">
                                                        <h4 class="card-title">File format</h4><br>
                                                        <table class="table table-hover m-b-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Fields</th>
                                                                <th>Description</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Student ID <span class="text-red">*</span></td>
                                                                <td>Ex: ITITIU20001</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Student Name <span class="text-red">*</span></td>
                                                                <td>Ex: Nguyễn Văn A</td>
                                                            </tr>
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
</html>