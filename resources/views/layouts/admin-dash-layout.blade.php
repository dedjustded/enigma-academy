<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{\URL::to('/')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href='/' class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          @auth
        <li>
          <div class="text-end">
        <li><a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        <li>
  </div>
  @endauth
  </li>
  </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Enigma Academy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->first_name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      @auth
      @if(Auth::user()->role->code == "admin")
      <!-- Sidebar Menu -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Permissions
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/permission/teachers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teachers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/permission/students" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/permission/employeers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Employers</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Trainings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/trainings" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Courses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/training/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create New Course</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  My profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="viewMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="editMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="changeMyPassword" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change password</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="/admin/users" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/employeers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Employeers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/teachers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teachers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/student-table" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="showStudentsByTraining" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students performance</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/users" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Default users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/add-user" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add new user</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      @elseif(Auth::user()->role->code == "teacher")
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  My profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="viewMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="editMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="changeMyPassword" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change password</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Trainings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/trainings" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Courses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/training/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create New Course</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Students
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/student-table" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View all students</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="showStudentsByTraining" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students performance</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

      @endif

      @if(Auth::user()->role->code == "employeer")
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  My profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="viewMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="editMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="changeMyPassword" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change password</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      @elseif(Auth::user()->role->code == "student")
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  My profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="viewMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="editMyDetails" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit my details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="changeMyPassword" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change password</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="enrolledTrainings" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Enrolled trainings
                  <i class="right fas fa-angle"></i>
                </p>
              </a>
              <a href="guest/trainings" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Trainings
                  <i class="right fas fa-angle"></i>
                </p>
              </a>

            </li>
          </ul>
        </nav>
      </div>
      @endif
      @endauth

      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="row">
      <div class="col-xl-12 d-flex">

        <div class="card flex-fill student-space comman-shadow">
          <div class="card-header d-flex align-items-center">
            <ul class="chart-list-out student-ellips">
            </ul>
          </div>
          <div class="card-body">

            @yield('content')
          </div>
          <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
              <h5>Title</h5>
              <p>Sidebar content</p>
            </div>
          </aside>
          <!-- /.control-sidebar -->

          <!-- Main Footer -->

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
</body>

</html>

<style>
  label {
    font-weight: bold;
  }

  .button {
    margin-top: 10px;
  }

  .homework_class input[type="file"] {
    margin-top: 5px;
  }

  .training_class,
  .module_class,
  .lecture_class,
  .schedule_class,
  .homework_class,
  .submit_class {
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px;
    margin-bottom: 20px;
  }

  .training_class {
    padding-top: 5px;
  }

  .description_class {
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .add_description {
    size: "50";
    width: 80%;
    height: 100px;
  }

  .add_training_div {
    padding-top: 50px;
  }

  /* Dropdown Button */
  .dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 5px;
    font-size: 16px;
    border: none;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color: #3e8e41;
  }

  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }

  .container {
    margin-top: 50px;
  }

  .card {
    border: none;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
  }

  .card-body {
    padding: 20px;
  }

  h2 {
    color: #333;
    font-size: 24px;
    margin-top: 0;
    margin-bottom: 10px;
  }

  p {
    color: #666;
    margin-top: 0;
    margin-bottom: 10px;
  }

  ul {
    list-style-type: none;
    padding-left: 0;
  }

  .module-name {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .lecture-name {
    margin-bottom: 5px;
  }

  a {
    color: #337ab7;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  .button-add button:hover {
    background-color: #45a049;
  }


  header nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  header nav ul li {
    display: inline;
    margin-right: 10px;
  }

  header nav ul li a {
    color: #fff;
    text-decoration: none;
  }

  header nav ul li a span {
    text-decoration: underline;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
  }

  /* Header styles */
  header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    margin-bottom: 20px;
  }

  header nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  header nav ul li {
    display: inline;
    margin-right: 10px;
  }

  header nav ul li a {
    color: #fff;
    text-decoration: none;
  }



  /* Button container styles */
  .button-container {
    padding: 1px;
    border: 1px solid #ccc;
    text-align: center;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
    cursor: pointer;
  }

  .button:hover {
    background-color: #45a049;
  }

  /* Content styles */
  .content {
    padding: 20px;
  }

  header nav ul li a span {
    text-decoration: underline;
  }

  .button-add {
    padding: 10px;
  }

  .button-add button {
    padding: 10px 20px;
    border: none;
    background-color: #4CAF50;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
  }

  .button-add button:hover {
    background-color: #45a049;
  }
</style>