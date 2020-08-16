<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}else {
  include "../koneksi.php";
  include "../admin/controller/controller_laporan.php";
  include "../admin/model/header.php";
?>

<?php }?>
     <div id="page-wrapper">

        <div class="row">  <!-- <p><?php echo $sql; ?></p> -->
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
            </div> -->
          </div>

          <div class="col-lg-12">
            <h1>Data Pembayaran<small> Santri </small></h1>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Untuk cetak slip pembayaran silahkan klik tombol cetak.!
          </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Data Pembayaran Santri Kamar <?php echo $kamar; ?></h3> </div>
              <div class="panel-body">
                 <div class="table-responsive">
                  <div class="panel-title pull-right">
                    <form action="view/print_kamar.php" method="post">
                      <input name="sql" value="<?php echo $sql; ?>" hidden/>
                      <input name="tahun" value="<?php echo $tahun; ?>" hidden/>
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
                        <th>No<i></i></th>
                        <th>NIS<i></i></th>
                        <th>Nama<i></i></th>
                        <th>Bulan<i></i></th>
                        <th>Pembayaran<i></i></th>
                        <th>Nominal<i></i></th>
                        <th>Tanggal bayar <i></i></th>
                        <th>Jam bayar <i></i></th>
                      </thead>
                      <tbody>
                        <?php
                        $n=1;
                          foreach ($query as $data) { ?>
                          <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama_santri']; ?></td>
                            <td><?php echo formatMonth($data['bulan']);?></td>
                            <td><?php echo $data['jenis_bayar']; ?></td>
                            <td align="right">Rp.<?php echo number_format($data['nominal'],2,',','.').",-";?></td>
                            <td><?php echo $data['tanggal_bayar'];?></td>
                            <td><?php echo $data['jam_bayar']; ?></td>
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
