<!DOCTYPE html>
<html lang="en">
  <head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reklame</title>

    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

<body class="nav-md">
<section class="container body">
<!-- Start Header --> 
<div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-image"></i> <span>Reklame</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>assets/images/1.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo ucfirst($this->session->userdata('username')); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <br />
            <br />
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i>Pemesan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Pemesan') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Pemesan/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Pemesan/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Pemesan/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i>Pemesanan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Pemesanan') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Pemesanan/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Pemesanan/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Pemesanan/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-image"></i>Reklame<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Reklame') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Reklame/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Reklame/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Reklame/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-tasks"></i>Jenis<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Jenis') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Jenis/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Jenis/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Jenis/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sort-amount-desc"></i>Ukuran<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Ukuran') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Ukuran/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Ukuran/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Ukuran/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map-marker"></i>Area<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('Area') ?>">Lihat Data</a></li>
                      <li><a href="<?php echo base_url('Area/create') ?>">Tambah Data</a></li>
                      <li><a href="<?php echo base_url('Area/excel') ?>">Export Excel</a></li>
                      <li><a href="<?php echo base_url('Area/word') ?>">Export Word</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="<?php echo base_url() ?>assets/javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url() ?>assets/images/1.jpg" alt=""><?php echo ucfirst($this->session->userdata('username')); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url() ?>admin/update"> Ubah Profil</a></li>
                    <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="<?php echo base_url() ?>assets/javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url() ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url() ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
      <div class="right_col" role="main">           
          <?php echo $_content?>
      </div>
      <!-- /page content -->
<!-- footer content -->
        <footer>
          <div class="pull-right">
            Created by Tim PemWebLan Setrong
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>

  </body>
</html>