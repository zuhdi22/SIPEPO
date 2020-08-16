<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}else {
  include "../koneksi.php";
  include "../admin/controller/controller_laporantahunan.php";
  include "model/header.php";
?>

 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Tahunan <small>SIKEPO </small></h1>
            <!-- <p><?php echo $sql; ?></p> -->
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
                    <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Pembayaran <?php echo $jenis.' Tahun '.$tahun; ?> </h3>
                  </div>
                  <div class="panel-title pull-right">
                    <form action="view/print_tahunan.php" method="post">
                      <input name="sql" value="<?php echo $sql; ?>" hidden/>
                      <input name="jenis" value="<?php echo $jenis; ?>" hidden/>
                      <input name="tahun" value="<?php echo $tahun; ?>" hidden/>
                      <input name="angkatan" value="<?php echo $angkatan; ?>" hidden/>
                      <input name="kamar" value="<?php echo $kamar; ?>" hidden/>
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</button>
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
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Agu</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                      </thead>
                      <tbody>
                        <?php
                        $n=1;
                          foreach ($query as $data) {
                            ?>
                          <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama_santri']; ?></td>
                            <td><?php echo $data['1']; ?></td>
                            <td><?php echo $data['2']; ?></td>
                            <td><?php echo $data['3']; ?></td>
                            <td><?php echo $data['4']; ?></td>
                            <td><?php echo $data['5']; ?></td>
                            <td><?php echo $data['6']; ?></td>
                            <td><?php echo $data['7']; ?></td>
                            <td><?php echo $data['8']; ?></td>
                            <td><?php echo $data['9']; ?></td>
                            <td><?php echo $data['10']; ?></td>
                            <td><?php echo $data['11']; ?></td>
                            <td><?php echo $data['12']; ?></td>
                          </tr>
                        <?php
                        $n++;
                          } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <?php
      include "../admin/model/footerlaporan.php";
    ?>
  </body>
</html>
