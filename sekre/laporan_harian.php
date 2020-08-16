<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}else {
  include "../koneksi.php";
  include "../sekre/model/header.php";
  $tgl  = explode('-', $_POST['harian']);
  function format_date($tgl){
    return date('d/m/Y', strtotime($tgl));
  }

  $tgl_awal = format_date($tgl[0]);
  $tgl_akhir = format_date($tgl[1]);

  $conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
  $sql = "SELECT bayar.*, santri.nama_santri FROM bayar JOIN santri ON bayar.nis = santri.nis WHERE tanggal_bayar BETWEEN '$tgl[0]' AND '$tgl[1]'" ;
  $query = mysqli_query($conn, $sql);
}

  //$num = mysqli_num_rows($query);



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
  }
?>
 <?php  ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Harian <small>SIPEPO </small></h1>
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
            </div> -->
          </div>

          <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="panel-title pull-left">
                    <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Tanggal <?php echo $tgl_awal.' - '.$tgl_akhir; ?> </h3>
                  </div>
                  <div class="panel-title pull-right">
                    <form action="view/print_harian.php" method="post">
                      <input name="sql" value="<?php echo $sql; ?>" hidden/>
                      <input name="harian" value="<?php echo $tgl_awal.' - '.$tgl_akhir; ?>" hidden/>
                      <button type="submit" name="excel" value="excel" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</button>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table  class="table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Bayar</th>
                        <th>Bulan/Tahun</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                      </thead>
                      <tbody>
                        <?php
                        $n=1;
                        $sum=0;

                          foreach ($query as $data) { ?>
                          <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama_santri']; ?></td>
                            <td><?php echo $data['jenis_bayar']; ?></td>
                            <td><?php echo formatMonth($data['bulan']).' '.$data['tahun']; ?></td>
                            <td>Rp.<?php echo number_format($data['nominal'],2,',','.').",-";?></td>
                            <td><?php echo $data['ket']; ?></td>
                          	<?php $sum = $sum + $data['nominal'];?>
                          </tr>
                        <?php
                        $n++;
                          }
                          echo "Total Pemasukan : Rp.". number_format($sum,2,',','.').",-</b>";?>

                        </table>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>

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

      });
    </script>
  </body>
</html>
