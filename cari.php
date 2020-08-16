<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <div class="container-fluid">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Pembayaran Santri">
    <meta name="author" content="ahmad zuhdi alwan">
    <link rel="icon" type="image/png" href="../logo.jpg">
     <title>SIPEPO(Sistem Pencatatan Keuangan Pondok)</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">


  </head>
  <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">Aplikasi Keuangan Pondok Pesantren</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

      </nav>
     <?php  ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Cari Data Pembayaran</data> </h1>
        </div>


        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Cari data Pembayaran Santri </h3>
              </div>
								<br>
                   <form class="form-horizontal" role="search" method="get" action="tampil.php?cari-bayar">
        <div class="col-md-3 col-xs-12">
            <input type="text" name="keyword" class="form-control" placeholder="Ketik NIS Anda...">
        </div>
        <div class="text-left">
            <button class="btn btn-default" type="submit" name="submit-cari-bayar" value="keyword">Cari</button>
			</div>
    </form>
							<div class="panel-body">
                 <div class="table-responsive">


              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="assets/js/morris/chart-data-morris.js"></script>
    <script src="assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="assets/js/tablesorter/tables.js"></script>

  </body>
</html>
