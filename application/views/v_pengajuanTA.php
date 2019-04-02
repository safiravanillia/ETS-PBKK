<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>informatikaTA | Pengajuan tugas akhir</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ; ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ; ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ; ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ; ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ; ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ; ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ; ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ; ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

    <?php
    $id_login   = $this->session->userdata("m_id");
    $datalogin  = $this->db->get_where("mahasiswa", array('m_id'=> $id_login))->row();
    $status = $this->db->get_where("proposal", array('m_id'=> $id_login,'p_status'=>"Diterima"))->row();
    
    
    $proposal = $this->db->get_where("proposal", array('m_id'=> $id_login))->row();
    if($proposal==null){
        $rmk=null;
        $status2=null;
    }else{
        $status2= $this->db->get_where("ta", array('p_id'=> $proposal->p_id))->row();
        $rmk = $this->db->get_where("rmk", array('r_id'=> $proposal->r_id))->row();
    }
    
    ?>
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>i</b>TA</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>informatika</b>TA</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $datalogin->m_nama; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                    <?php echo $datalogin->m_nama; ?>
                                        <small><?php echo $datalogin->m_id; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $datalogin->m_nama; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                    <li class=" treeview">
                        <a href="#">
                            <i class="fa fa-book"></i> <span>Proposal</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('pengajuan'); ?>"><i class="fa fa-circle-o"></i> Pengajuan
                                    proposal</a></li>
                            <li><a href="<?php echo base_url('status'); ?>"><i class="fa fa-circle-o"></i> Status proposal</a></li>
                        </ul>
                    </li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-mortar-board"></i> <span>Tugas Akhir</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?php echo base_url('pengajuanta'); ?>"><i class="fa fa-circle-o"></i> Pengajuan tugas akhir</a></li>
                            <li><a href="<?php echo base_url('statusta'); ?>"><i class="fa fa-circle-o"></i> Status tugas akhir</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Pengajuan tugas akhir
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Tugas Akhir</li>
                    <li class="active">Pengajuan tugas akhir</li>
                </ol>
            </section>
            <?php 
            if($status==null ||($status->p_status=="Diterima" && $status->p_dosbing1==null) ){echo'
                <div class="pad margin no-print">
                    <div class="callout callout-danger" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i> Catatan:</h4>
                        Proposal belum diterima, silahkan <b><a href="status">cek status proposal</a></b> Anda
                    </div>
                </div>';
                }
            elseif($status2!=null){echo'
            <div class="pad margin no-print">
                <div class="callout callout-success" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i> Catatan:</h4>
                    Tugas akhir sudah diajukan, silahkan <b><a href="statusta">cek status tugas akhir</a></b> Anda
                </div>
            </div>';
            } elseif($status->p_status=="Diterima" && $status->p_dosbing1!=null){
                echo'
                <!-- Main content -->
            <section class="content">
                <!-- form pengajuan -->
                <div class="box box-primary color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-edit"></i> Lengkapi form pengajuan tugas akhir berikut</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" action="pengajuanta/tambah" method="post"  enctype="multipart/form-data" >
                            <div class="box-body">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Bidang Minat</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                value="'.$rmk->r_nama.'"disabled>
                            </div>
                                <div class="form-group">
                                    <input name="p_id" type="hidden" value="'.$proposal->p_id.'" " class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul</label>
                                    <input name="p_judul" type="text" class="form-control" id="exampleInputEmail1"
                                    value="'.$proposal->p_judul.'" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Abstraksi tugas akhir</label>
                                    <textarea name="t_abstraksi" class="form-control" rows="3" placeholder="Tuliskan abstraksi tugas akhir"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File Tugas Akhir</label>
                                    <input name="t_file" type="file" id="exampleInputFile">

                                    <p class="help-block">maks 100 mb (.pdf)</p>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                ';
            }
            
            ?>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2019 <b>safiravanillia</b>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ; ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ; ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ; ?>"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ; ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ; ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ; ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ; ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ; ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ; ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ; ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ; ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ; ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js') ; ?>"></script>
</body>

</html>