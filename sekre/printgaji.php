<?php
session_start();
if (empty($_SESSION['username'])){
  echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";
} else {
  include "../koneksi.php";
  include "../sekre/controller/controller_date.php";
  include "model/header.php";
?>

<?php } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>PP DURROTU ASWAJA Semarang <small>,ind</small></h1>
            <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td>
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
        </div><!-- /.row -->


        <!-- /.row -->
        <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
              <h3 class="panel-title" ><i class="fa fa-user"></i> Slip Pembayaran Santri Bulan <?php echo date("F Y");?> </h3>
              </div>
              <div class="panel-body">
                 <div>
                    <?php
                    $tampil=mysql_query("SELECT * FROM santri k,bayar g WHERE k.nis=g.nis AND g.id_bayar='$_GET[kd]'");
                     $data=mysql_fetch_array($tampil)
                     ?>
                  <?php

      require 'view/lib/lib-function.php';
      $fungsi = new Fungsi();?>
      <span style="text-align: right;display:block">Nomor Kwitansi :
      <?php
      echo "<b>".$fungsi->KwNums()."</b>";
      ?>
      </span>
      <form name="form" method="post" action="view/cetak-oo.php" target="_blank">
      <table cellspacing="4" cellpadding="50">
      <tr>
        <td><label for="nama_santri">Terima Dari :</label></td>
        <td><input type="text" name="nama_santri" class="form-control" id="nama_santri" size="45" value="<?php echo $data['nama_santri'];?>" readonly="readonly" ></td></tr>
      <tr><td><b>Jumlah Uang : <b></td>
        <td><input type="text" name="nominal" class="form-control" id="nominal" size="45" value="<?php echo $data['nominal'];?>" readonly="readonly" ></td></tr>
      <tr>
        <td><b>Jenis Pembayaran : <b></td>
          <td><input type="text" name="jenis_bayar" class="form-control" id="jenis_bayar" size="45" value="<?php echo $data['jenis_bayar'];?>" readonly="readonly" ></td></tr>
          <tr><td><b>Bulan :<b></td>
        <td><input type="text" name="bulan" class="form-control" id="bulan" size="45" value="<?php echo formatMonth($data['bulan']);?>" readonly="readonly" ></td></tr>
      <tr><td><b>Admin :<b></td><td><input type="text" name="admin" class="form-control" placeholder="Nama Admin" size="45"></td></tr>

     <tr><td align="LeftPosition"><input type="submit" class="btn btn-success btn-md" value="cetak &raquo;"></td><td align="right"><input type="reset" class="btn btn-success btn-md" value="&laquo; reset"></td></tr>
      </table>
      </form>
      </div>

              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    <?php
      include "model/footerbiasa.php";
    ?>
  </body>
</html>
