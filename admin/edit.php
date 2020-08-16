<?php
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";
} else {
	include "../koneksi.php";
	include "../admin/model/header.php";
?>
<?php } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>Admin </small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Selamat Datang Di Halaman Admin...
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
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Edit Data Santri </h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">

                  <?php
$query = mysql_query("SELECT * FROM santri WHERE id_santri='$_GET[kd]'");
$data  = mysql_fetch_array($query);
?>
    <form action="controller/update.php" method="post">
    <table class="table table-condensed">
    <tr>
        <td><label for="id_santri">ID Santri</label></td>
        <td><input name="id_santri" type="hidden" class="form-control" id="id_santri" value="<?php echo $data['id_santri'];?>"
          readonly="readonly"/></td>
      </tr>
      <tr>
        <td><label for="nis">NIS </label></td>
        <td><input name="nis" type="text" class="form-control" id="nis" value="<?php echo $data['nis'];?>" required></td>
      </tr>
      <tr>
        <td><label for="nama_santri">Nama Santri</label></td>
        <td><input name="nama_santri" type="text" class="form-control" id="nama_santri" value="<?php echo $data['nama_santri'];?>" required/></td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat Santri</label></td>
        <td><input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $data['alamat'];?>" required/></td>
      </tr>
      <tr>
        <td><label for="kamar"> Kamar </label></td>
        <td><select name="kamar" id="kamar" class="form-control" value="<?php echo $data['kamar'];?>" required>

<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
<option value="F">F</option>
<option value="G">G</option>
<option value="H">H</option>
<option value="Al Hadi">Al Hadi</option>
<option value="Al Jabbar">Al Jabbar</option>
<option value="Al Mujib">Al Mujib</option>
<option value="An Nafi">An Nafi</option>
<option value="As Salam">As Salam</option>
<option value="An Nur">An Nur</option>
<option value="Al Baits">Al Baits</option>
<option value="Ar Rohman">Ar Rohman</option>
<option value="Al Hakim">Al Hakim</option>
<option value="Al Hafidz">Al Hafidz</option>
<option value="Koperasi">Koperasi</option>
      <tr>
        <td><label for="angkatan"> Angkatan </label></td>
        <td><select name="angkatan" id="angkatan" class="form-control" value="<?php echo $data['angkatan'];?>" required>

<option value="Sakinah">Sakinah</option>
<option value="Mumarosah">Mumarosah</option>

      <tr>
        <td><label for="wali">Orang Tua</label></td>
        <td><input name="wali" type="text" class="form-control" id="wali" value="<?php echo $data['wali'];?>" required/></td>
      </tr>
      <tr>
        <td><label for="no_hp">Telepon Wali</label></td>
        <td><input name="no_hp" type="text" class="form-control" id="no_hp" value="<?php echo $data['no_hp'];?>" required/></td>
      </tr>
      <tr>
        <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
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
			include "../admin/model/footerbiasa.php";
		?>

  </body>
</html>
