<?php

session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
?>
 <?php } ?>
 <html lang="en">
   <head>
     <div class="container-fluid">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Aplikasi Pembayaran Santri">
     <meta name="author" content="ahmad zuhdi alwan">
     <link rel="icon" type="image/png" href="../logo.jpg">
      <title>SIPEPO - Sistem Pencatatan Keuangan Pondok</title>

     <!-- Bootstrap core CSS -->
     <link href="../assets/css/bootstrap.css" rel="stylesheet">

     <!-- Add custom CSS here -->
     <link href="../assets/css/sb-admin.css" rel="stylesheet">
     <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" href="../assets/daterangepicker/daterangepicker.css">
     <!-- Page Specific CSS -->
     <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
 		<!-- select2 -->
     <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">
     <link rel="stylesheet" href="../assets/select2-bootstrap/dist/select2-bootstrap.min.css">


   </head>
   <body>
     <div id="wrapper">

       <!-- Sidebar -->
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">Aplikasi Keuangan Pondok Pesantren</a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
           <ul class="nav navbar-nav side-nav">
             <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Data Santri</a></li>
             <li class="dropdown">
               <a href="data_bayaraja.php">
                 <i class="fa fa-bar-chart-o"></i>
                 Data Pembayaran Santri
               </a>
             <li>
               <a href="data_bayar.php">
               <i class="fa fa-desktop"></i> Cetak Slip Pembayaran </a>
             </li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
               <ul class="dropdown-menu">
                 <li><a href="harian.php">Laporan Harian</a></li>
 <li><a href="bulanan.php">Laporan Perbulan</a></li>
                 <li><a href="tahunan.php">Laporan Tahunan</a></li>
                 </ul>
             </li>
           </ul>

           <ul class="nav navbar-nav navbar-right navbar-user">
             <li class="dropdown user-dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
               <?php
               echo $_SESSION['username'];
                ?>
               <b class="caret"></b></a>
               <ul class="dropdown-menu">
                 </li>
                 <li><a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar </a></li>
               </ul>
             </li>
           </ul>
         </div><!-- /.navbar-collapse -->
       </nav>

     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-14">
            <h1>Laporan harian <small>SIPEPO </small></h1>
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
          </div> -->
          <form class="form-inline" name="form_harian" action="laporan_harian.php" method="post">
            <div class="form-group">
            <label class="control-label"> Pilih Tanggal :  </label>
            </div>
            <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="form-group">
                <div class="col-lg-13">
              <input type="text" class="form-control pull-right" name="harian" id="harian">
            </div>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>

          </form>
        </div><!-- /.row -->
<!--
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Traffic Statistics: October 1, 2013 - October 31, 2013</h3>
              </div>
              <div class="panel-body">
                <div id="morris-chart-area"></div>
              </div>
            </div>
          </div>
        </div>-->
        <!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- JavaScript -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="../assets/js/morris/chart-data-morris.js"></script>
    <script src="../assets/code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--<script src="jquery-ui/jquery-ui.min.js"></script> -->
    <script src="../assets/moment/min/moment.min.js"></script>
    <script src="../assets/moment/moment.js"></script>
    <script src="../assets/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../assets/js/tablesorter/tables.js"></script>

    <!-- select2 -->
    <script src="../assets/select2/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function(){
      $('#harian').daterangepicker({
        locale:{
          format : 'YYYY/MM/DD',
          applyLabel : 'Terapkan',
          cancelLabel : 'batal',
          customRangeLabel : 'Rentang Khusus',
          daysOfWeek : [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
          monthNames :[
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          ],
          firstDay:1
        },
        ranges: {
          'Hari ini':[
            moment(new Date),
            moment(new Date),
          ],
        },
        alwaysShowCalendars:true,
        opens:'center'

      })
    });
  </script>
  </body>
</html>
