<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.html');
} else {
	include "../koneksi.php";
	include "../admin/model/header.php";
?>

<?php } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Halaman Utama <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Halaman Utama</li>
            </ol>

            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Santri ID auto number jadi tidak perlu di isi, abaikan saja..
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
                <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Data Santri </h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">

    <form action="insert.php" method="post">
    <table class="table table-condensed">
      <tr>
        <td><label for="nis">NIS </label></td>
        <td><input name="nis" type="text" class="form-control" id="nis" placeholder="NIS Santri" required/></td>
      </tr>
      <tr>
        <td><label for="nama_santri">Nama Santri</label></td>
        <td><input name="nama_santri" type="text" class="form-control" id="nama_santri" placeholder="Nama Santri" required/></td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat Santri</label></td>
        <td><input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat Santri" required/></td>
      </tr>
      <tr>
        <td><label for="kamar"> Kamar </label></td>
        <td><select name="kamar" id="kamar" class="form-control" required>

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
        <td><select name="angkatan" id="angkatan" class="form-control" required>

<option value="Sakinah">Sakinah</option>
<option value="Mumarosah">Mumarosah</option>

      <tr>
        <td><label for="wali">Orang Tua</label></td>
        <td><input name="wali" type="text" class="form-control" id="wali" placeholder="wali" required/></td>
      </tr>
      <tr>
        <td><label for="no_hp">Telepon Wali</label></td>
        <td><input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="Telepon" required/></td>
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

    <!-- JavaScript -->

				<?php
					include "../admin/model/footertambah.php";
				?>

  </body>
</html>
