<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.html');
} else {
	include "koneksi.php";
	include "../admin/model/header.php";
?>

<?php
 } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Masukkan Data Pembayaran Santri </h1>
            <br />
        </div>

        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-edit"></i> Form Pembayaran</h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">

									 <?php
									 $query = mysql_query("SELECT * FROM santri WHERE nis='$_GET[kd]'");
									 $data  = mysql_fetch_array($query);
									 ?>
    <form action="controller/insert_absen.php" method="post" autocomplete="off" name="transfer">
    <table class="table table-condensed">
    <tr>
        <td><label for="nis"> NIS </label></td>
        <td><input name="nis" type="text" class="form-control" id="nis" placeholder="Nomor Induk Santri" value="<?php echo $data['nis'];?>"
          readonly="readonly"></td>
      </tr>
      <tr>
        <td><label for="jenis_bayar"> Jenis Pembayaran </label></td>
        <td>
					<select name="jenis_bayar" type="text" id="jenis_bayar" class="form-control" required>
						<option> </option>
						<option value="Ianah">Ianah</option>
						<option value="Katering">Katering</option>
					</select>
				<td>
			</tr>
			<tr>
        <td><label for="nominal">Nominal </label></td>
        <td><input name="nominal" type="text" class="form-control" id="nominal" placeholder="Masukkan Nominal" required/></td>
      </tr>

      <tr>
        <td><label for="bulan">Bulan</label></td>
        <td>
					<select name="bulan" type="text" id="bulan" class="form-control" required>
						<option></option>
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option>
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option>
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</td>
			</tr>

		<tr>
			<td><label for="tahun"> Tahun </label></td>
			<td>
				<select name="tahun" type="date" class="form-control" id="tahun" required>
					<option></option>
					<option><?php echo date('Y', strtotime('-2 years')); ?></option>
					<option><?php echo date('Y', strtotime('-1 years')); ?></option>
					<option><?php echo date('Y'); ?></option>
					<option><?php echo date('Y', strtotime('+1 years')); ?></option>
				</select>
			</td>
    </tr>

    <tr>
      <td><label for="ket">Keterangan</label></td>
      <td>
				<select name="ket" type="text" id="ket" class="form-control" required>
					<option></option>
					<option value="Lunas">Lunas</option>
					<option value="Tidak ikut">Tidak ikut</option>
				</select>
			</td>
		</tr>

    <tr>
			<td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary">&nbsp;<a href="absensi.php" class="btn btn-sm btn-primary">Kembali</a></td>
    </tr>

    </table>
    </form>
		</div>
                <!-- <div class="text-right">
                  <a href="#"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>

                </div>-->
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

		<?php
			include "../admin/model/footer.php";
		?>

  </body>
</html>
