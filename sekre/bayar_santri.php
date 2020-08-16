<?php

session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
  $conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
  $sql = mysqli_query($conn, 'SELECT nama_santri FROM santri UNION SELECT nama_santri FROM bayar ORDER BY ASC');

?>
<?php
	include "../sekre/model/header.php";
?>
 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan perbulan <small>SIPEPO </small></h1>
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
          </div> -->
          <form class="form-inline" name="form_bulanan" action="rekap_santri.php" method="post">
            <select name="jenis" class="form-control" id="jenis" required>
              <option></option>
              <option>Ianah</option>
              <option>Katering</option>
            </select>

            <select type="text " name="nama_santri" class="form-control" id="nama_santri" required>
              <option></option>
              <?php foreach ($sql as $data) { ?>
              <option><?php echo $data['nama_santri']; ?></option>
              <?php } ?>
              </select>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  <?php
    include "../sekre/model/footerbayar.php";
  ?>
  </body>
</html>
