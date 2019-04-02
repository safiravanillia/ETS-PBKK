<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>informatikaTA | Data tugas akhir</title>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ; ?>">
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
    $id_login   = $this->session->userdata("d_id");
    $datalogin  = $this->db->get_where("dosen", array('d_id'=> $id_login))->row();

    $proposal = $this->db->query("SELECT * FROM mahasiswa as m, proposal as p, ta as t,rmk as r where m.m_id = p.m_id 
    and t.p_id=p.p_id and p.r_id=r.r_id;");
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
                                <span class="hidden-xs"> <?php echo $datalogin->d_nama; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                    <?php echo $datalogin->d_nama; ?>
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
                        <p><?php echo $datalogin->d_nama; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?php echo base_url('data'); ?>"><i class="fa fa-book"></i> <span>Data proposal</span></a></li>
                    <li class="active"><a href="<?php echo base_url('datata'); ?>"><i class="fa fa-book"></i> <span>Data tugas akhir</span></a></li>
                    <li><a href="<?php echo base_url('plotting'); ?>"><i class="fa fa-pencil"></i> <span>Plotting dosbing</span></a></li>
                    <li><a href="<?php echo base_url('tanggalsidang'); ?>"><i class="fa fa-pencil"></i> <span>Plotting sidang</span></a></li>
                    <li><a href="<?php echo base_url('nilai'); ?>"><i class="fa fa-pencil"></i> <span>Input Nilai</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Data Tugas Akhir
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Data tugas akhir</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- form pengajuan -->
                <div class="box box-primary color-palette-box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Abstraksi</th>
                                    <th>File TA</th>
                                    <th>Bidang Minat</th>
                                    <th>Status</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($proposal->result() as $p){ ?>
                                <tr>
                                <td><button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                                            data-target="#modal-default<?=$p->t_id;?>"><?php echo' '.$p->t_id.' ';?></button></td>
                                    <td><?php echo' '.$p->m_id.' ';?></td>
                                    <td> <?php echo' '.$p->m_nama.' ';?></td>
                                    <td> <?php echo' '.$p->p_judul.' ';?></td>
                                    <td> <?php echo' '.$p->t_abstrak.' ';?></td>
                                    <td><a href="<?php echo base_url().'datata/download/'.$p->t_file;?>">Download file</a></td>
                                    <td><?php echo'<span class="badge bg-yellow">'.$p->r_nama.'</span>';?></td>
                                    <td><?php if($p->t_status=="Tunggu"){
                                    echo '<span class="badge bg-blue">Tunggu</span>';
                                 }elseif($p->t_status=="Proses Sidang"){
                                    echo ' <span class="badge bg-yellow">Proses Sidang</span>';
                                 }elseif($p->t_status=="Selesai"){
                                    echo ' <span class="badge bg-green">Selesai</span>'; }?></td>
                                    <td> <?php echo'<span class="badge bg-blue">'.$p->t_nilai.'</span>';?></td>
                    </div>
                    <!-- /.box-body -->
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php foreach($proposal->result() as $p){ ?>
        <div class="modal fade" id="modal-default<?=$p->t_id;?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Detail Sidang</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    Tanggal Sidang : 
                                    <?php 
                                    echo' <span class="badge bg-yellow">'; 
                                    echo date("d/m/Y H:m", strtotime($p->t_tanggal) );
                                    echo' WIB </span>';
                                    ?><br>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Nama Dosen</th>
                                            <th>Peran</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                            <?php if($p->t_penguji1==null){
                                                echo'-';
                                            }else{
                                                echo ''.$p->t_penguji1.'';
                                            }?>
                                            </td>
                                            <td>Dosen Penguji 1</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td><?php if($p->t_penguji2==null){
                                                echo'-';
                                            }else{
                                                echo ''.$p->t_penguji2.'';
                                            }?></td>
                                            <td>Dosen Penguji 2</td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <?php } ?>
                <!-- /.modal -->
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
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ; ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ; ?>"></script>
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
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>

</html>