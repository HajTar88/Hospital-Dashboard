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
  <style>
    .pagination {
      display: inline-block;
    }
    .pagination a {
      color: #000;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
      border: 1px solid #ddd;
    }
    .pagination a.active{
      background-color: #4caf50;
      color: white;
      border: 1px solid #4caf50;
    }
    .pagination a:hover:not(.active)
    {background-color: #ddd;}
    .pagination a:first-child{
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
    }
    .pagination a:last-child{
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;

    }
  </style>
<!--- icon ---->
    <link rel="stylesheet" href="{{ URL::asset('img/AdminLTELogo.png') }}">
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
    <a href="index3.html" class="brand-link">
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
           <li class="nav-item ">
            <a href="{{route('db.index')}}" class="nav-link">
             <i class="bi bi-house"></i>
             <p>
               الرئيـــــسية
             </p>
            </a>
           </li>


           <li class="nav-item">
             <a href="{{route('doctors.index')}}" class="nav-link ">
               <i class='fas fa-user-md'></i>
               <p>الأطبــــــاء</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{route('patients.index')}}" class="nav-link active">
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
                <li  class="nav-item has-treeview menu-open">
                  <a href="./report.html" class="nav-link">
                  <i class="bi bi-file-earmark-medical"></i>
                <p>
                التقارير
               </p>
               <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <a href="{{url('doctorsr')}}" class="nav-link">
                  <i class="bi bi-file-earmark-medical"></i>
                <p>
                تقارير الأطبــــــاء

               </p>
                </a>
              </ul>
                <ul class="nav nav-treeview">
                  <a href="{{url('patientsr')}}" class="nav-link">
                  <i class="bi bi-file-earmark-medical"></i>
                <p>
                تقارير المرضى

               </p>
                </a>
              </ul>
                <ul class="nav nav-treeview">
                  <a href="{{url('transfersr')}}" class="nav-link">
                  <i class="bi bi-file-earmark-medical"></i>
                <p>
                تقارير التحاويل

               </p>
                </a>
              </ul>

             <ul class="nav nav-treeview">
               <a href="{{route('transfers.index')}}" class="nav-link ">
                <i class="bi bi-arrow-left-right"></i>
                 <p>التحاويل</p>
               </a>
             </ul>
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
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fas fa-plus"></i>
                  <a href="{{route('patients.create')}}"><button class="btn btn-success">اضـــــافة مريض</button></a>
                </h3>

              </div><!-- /.card-header -->
              <div class="container">
                @if ($message = Session::get('success'))
                <div id="alert" class="alert alert-primary">
                {{$message}}
              </div>
                @endif
                @if ($message = Session::get('succe'))
                <div id="alert" class="alert alert-success" >
                {{$message}}
              </div>
                @endif
                @if ($message = Session::get('succes'))
                <div id="alert" class="alert alert-danger" >
                {{$message}}
              </div>
                @endif
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">

                      </div>
                    </div>
                  </form>


                    </div>
                    <table class="table table-bordered">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">رمز المريض</th>
                          <th scope="col">اسم المريض</th>
                          <th scope="col">العنوان </th>
                          <th scope="col">الحالة </th>
                          <th scope="col">التشخيص </th>
                          <th scope="col">العمليـــــات</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        @php
                        $i = 0 ;
                       @endphp
                        @foreach ($patients as $item)
                        <tr>

                          <td>{{$item->patient_code}}</td>
                          <td>{{$item->patient_name}}</td>
                          <td>{{$item->address}}</td>
                          <td>{{$item->case}}</td>
                          <td>{{$item->diagnosis}}</td>
                          <td>
                            <button type="button" class="btn btn-light"><a href="{{ route('patients.show', $item->id)}}" ><i class="bi bi-eye-fill"></i></a> </button>
                            <button type="button" class="btn btn-light"> <a href="{{url('modifyp/'.$item->id)}}" ><i class="far fa-edit text-success" ></i></a></button>
                            <button type="button" class="btn btn-light"> <a href="{{url('deletep/'.$item->id)}}" class="delete-confirm"><i class="fa fa-trash text-danger"></i></a>  </button>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">

              <!-- /.card-header -->
              <div class="card-body">
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->

                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->

              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->

            <!-- /.card -->
          </section>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script type="text/javascript">
  setTimeout(function () {

      // Closing the alert
      $('#alert').alert('close');
  }, 200);
</script>
    <!-- Including jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>

    <!-- Including Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
      $('.delete-confirm').on('click', function (e) {
          e.preventDefault();
          const url = $(this).attr('href');
          swal({
              title: 'تاكيد الحذف',
              text: 'سيتم حذف هذا العنصر بشكل تام',
              icon: 'warning',
              buttons: ["الغاء", "تاكيد"],
          }).then(function(value) {
              if (value) {
                  window.location.href = url;
              }
          });
      });
    </script>
</body>
</html>
