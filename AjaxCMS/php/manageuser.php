<?php
  include "dbconnection.php";
  include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                </div>
        <!-- /.card-header -->
        <!-- form start -->
                <form class="form-horizontal" id="userForm">
                    <input type="hidden" id="userId">
                    <div class="card-body">
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email">
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" id="btnuser" class="btn btn-success">Add User</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </section>
    <div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody id="tblUser">
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
    <!-- /.card -->
</div>

<?php
    include "footer.php";
?>