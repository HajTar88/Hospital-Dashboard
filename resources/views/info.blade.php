<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>لوحة تحكم المستشفى</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="bi bi-chat"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
     
    </ul>
  </nav>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" >
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">المدير</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="{{route('db.index')}}" class="nav-link active">
             <i class="bi bi-house"></i>
             <p>
               الرئيـــــسية
             </p>
            </a>
           </li>
           <li class="nav-item">
             <a href="{{route('doctors.index')}}" class="nav-link">
               <i class='fas fa-user-md'></i>
               <p>الأطبــــــاء</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{route('patients.index')}}" class="nav-link ">
               <i class="bi bi-people"></i>
               <p>المرضى</p>
             </a>
           </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="bi bi-gear"></i>
              <p>الاعدادات</p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                 <a href="{{route('operations.index')}}" class="nav-link">
                   <i class='fas fa-heartbeat'></i>
                   <p>العمليـــــات</p>
                 </a>
                </ul>
               <ul class="nav nav-treeview">
                 <a href="{{route('cares.index')}}" class="nav-link">
                   <i class='fas fa-praying-hands'></i>
                   <p>العناية</p>
                 </a>
               </ul>
                <ul class="nav nav-treeview">
                  <a href="{{route('rooms.index')}}" class="nav-link">
                   <i class='fas fa-bed' style='font-size:18px'></i>
                    <p>الغرف الخاصة</p>
                  </a>
                </ul>
                <ul class="nav nav-treeview">
                  <a href="{{route('wards.index')}}" class="nav-link ">
                    <i class="bi bi-activity"></i>
                    <p>العنابر</p>
                  </a>
                </ul>
                <ul class="nav nav-treeview">
                  <a href="{{route('nurseries.index')}}" class="nav-link">
                   <i class='fas fa-baby-carriage'></i>
                    <p>الحضانات</p>
                  </a>
                </ul>
            </li>
              <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                <i class="bi bi-file-earmark-medical"></i>
              <p>
              التقارير
             </p>
             <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <a href="" class="nav-link">
                <i class="bi bi-file-earmark-medical"></i>
              <p>
              تقارير الأطبــــــاء
              
             </p>
              </a>
            </ul>
              <ul class="nav nav-treeview">
                <a href="" class="nav-link">
                <i class="bi bi-file-earmark-medical"></i>
              <p>
              تقارير المرضى
              
             </p>
              </a>
            </ul>
              <ul class="nav nav-treeview">
                <a href="" class="nav-link">
                <i class="bi bi-file-earmark-medical"></i>
              <p>
              تقارير التحاويل
              
             </p>
              </a>
            </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('transfers.index')}}" class="nav-link ">
                <i class="bi bi-arrow-left-right"></i>
                 <p>التحاويل</p>
               </a>
            </li>
           <li class="nav-item">
           <a href="{{route('signout')}}" class="nav-link ">
             <i class="bi bi-box-arrow-right"></i>
             <p>
               تسجيـــــل خروج
             </p>
           </a>
           </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px;">
              <div class="inner">
                <h3>{{$wards}}</h3>

                <p> العنابر</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class="bi bi-activity"></i>
              </div>
              </div>
       
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info"  style="height: 130px;">
              <div class="inner">
                <h3>{{$patients}}</h3>

                <p>المرضى</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(245, 249, 252);">
                <i class="bi bi-people"></i>
              </div>
              </div>
       
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px;">
              <div class="inner">
                <h3>{{$doctors}}</h3>

                <p> الأطبــــــاء</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class='fas fa-user-md'></i>
              </div>
              </div>
       
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px;">
              <div class="inner">
                <h3>{{$rooms}}</h3>

                <p> عدد الغرف</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class='fas fa-bed' ></i>
              </div>
              </div>
       
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px;">
              <div class="inner">
                <h3>{{$transfers}}</h3>

                <p> التحاويل</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class="bi bi-arrow-left-right"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px; color: rgb(243, 250, 249);">
              <div class="inner">
                <h3>{{$cares}}</h3>

                <p> العناية</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class='fas fa-plus-circle'></i>
              </div>
              </div>
       
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="height: 130px;">
              <div class="inner">
                <h3>{{$operations}}</h3>

                <p> عدد العمليـــــات</p>
              </div>
              <div class="icon" style="margin-top: 20px; color: rgb(243, 250, 249);">
                <i class='fas fa-heartbeat'></i>
              </div>
              </div>
       
          </div>

          </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
