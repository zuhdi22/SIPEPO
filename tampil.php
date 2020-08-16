<?php
include "koneksi.php";
	function formatDate($date){
  	return date("d-m-Y", strtotime($date));
  }
	function formatMonth($month){
    if($month == 1){
      return 'Januari';
    }elseif ($month == 2) {
      return 'Februari';
    }elseif ($month == 3) {
      return 'Maret';
    }elseif ($month == 4) {
      return 'April';
    }elseif ($month == 5) {
      return 'Mei';
    }elseif ($month == 6) {
      return 'Juni';
    }elseif ($month == 7) {
      return 'Juli';
    }elseif ($month == 8) {
      return 'Agustus';
    }elseif ($month == 9) {
      return 'September';
    }elseif ($month == 10) {
      return 'Oktober';
    }elseif ($month == 11) {
      return 'November';
    }elseif ($month == 12) {
      return 'Desember';
    }



	$nis = $_POST['nis'];
	$conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
	$sql =  "SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.id_bayar ,bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.tahun, bayar.jam_bayar from bayar LEFT JOIN santri ON bayar.nis = santri.nis WHERE bayar.nis = '$nis' ";
	$query = mysqli_query($conn, $sql);
}
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

		 <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Cari Data Pembayaran</h1>
        </div>


        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
								<div class="panel-title pull-left">
								<h3 class="panel-title"><i class="fa fa-user"></i> Data Pembayaran Santri <?php
							                if(isset($_GET['keyword'])){
							                $keyword = $_GET['keyword'];
							              echo "NIS :".$keyword."";
							}


							?> </h3>


							</div>
							<div class="clearfix"></div>
						</div>
	<!-- <?php
                if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
              echo "<b>Hasil pencarian : ".$keyword."</b>";
}

?> -->
              <div class="panel-body">
                 <div class="table-responsive">
									 <table  class="table table-bordered table-hover table-striped tablesorter">
                    <?php
                    $tampil=mysql_query("SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.id_bayar, bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.jam_bayar from santri INNER JOIN bayar ON santri.nis=bayar.nis");
                    $total=mysql_num_rows($tampil);
                    ?>

										<thead>
										<th>No<i></i></th>
									  <th>NIS<i></i></th>
                    <th>Nama<i></i></th>
                    <th>Kamar<i></i></th>
                    <th>Angkatan<i></i></th>
										<th>Jenis Pembayaran<i></i></th>
										<th>Bulan<i></i></th>
                    <th>Nominal<i></i></th>
                    <th>Tanggal Bayar <i></i></th>
                    <th>Jam Bayar <i></i></th>

                    </tr>
                     <?php
                       if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        $tampil = mysql_query("SELECT * from santri INNER JOIN bayar ON santri.nis=bayar.nis where bayar.nis like '".$keyword."'");
											}if(mysql_num_rows($tampil)){
                          $no = 1;
													$sum=0;
                        while($data = mysql_fetch_array($tampil)){ ?>
                    <tr>
												<td><?php echo $no; ?></td>
                      <td class="hidden"><?php echo $data['id_bayar']; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama_santri']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo $data['angkatan']; ?></td>
                    <td><?php echo $data['jenis_bayar']; ?></td>
                    <td><?php echo formatMonth($data['bulan']);?></td>
                    <td align="right">Rp.<?php echo number_format($data['nominal'],2,',','.').",-";?></td>
                    <td><?php echo formatDate($data['tanggal_bayar']);?></td>
                    <td><?php echo $data['jam_bayar']; ?></td>
										<?php $sum = $sum + $data['nominal'];?>
										</tr>
                 <?php
								 	$no++;
							 } echo "Total Bayar : Rp.". number_format($sum,2,',','.').",-</b>";
						 }else{
								echo "<script>alert('Data tidak ditemukan'); window.location = 'cari.php'</script>";
										}?>

									 </tbody>
                   </table>

                   </div>

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
		<script src="../assets/select2/dist/js/select2.min.js"></script>
		<script>
			$(document).ready(function(){

			});
		</script>
  </body>
</html>
