<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}else {
  include "../koneksi.php";
  $nama = $_POST['nama_santri'];
  $jenis = $_POST['jenis'];
  $conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
  if ($jenis == 'Katering') {
    $sql = "SELECT bayar.*, santri.nama_santri FROM bayar JOIN santri ON bayar.nis = santri.nis WHERE tanggal_bayar LIKE '%$date%' AND jenis_bayar LIKE '%$jenis%'";
    $query = mysqli_query($conn, $sql);
  }elseif ($jenis == 'Ianah') {
    $sql = "SELECT bayar.*, santri.nama_santri FROM bayar JOIN santri ON bayar.nis = santri.nis WHERE tanggal_bayar LIKE '%$date%' AND jenis_bayar LIKE '%$jenis%'";
    $query = mysqli_query($conn, $sql);
}

  //$num = mysqli_num_rows($query);

  include "../sekre/controller/controller_date.php";
  include "../model/header.php";
?>

 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Bulanan <small>SIPEPO </small></h1>
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
                    <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Bulan <?php echo formatMonth($bulan); ?> </h3>
                  </div>
                  <div class="panel-title pull-right">
                    <form action="view/print_bulanan.php" method="post">
                      <input name="sql" value="<?php echo $sql; ?>" hidden/>
                      <input name="nama" value="<?php echo formatMonth($bulan); ?>" hidden/>
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
    <?php
      include "../sekre/model/footerlaporan.php";
    ?>
  </body>
</html>
