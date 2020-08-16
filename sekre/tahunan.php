<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
  $conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
  $sql = mysqli_query($conn, 'SELECT tahun FROM rekap_tahunan_katering UNION SELECT tahun FROM rekap_tahunan_ianah ORDER BY tahun ASC');
include "../sekre/model/header.php";
?>

 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Tahunan <small>SIPEPO </small></h1>
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
          </div> -->
          <form class="form-inline" name="form_bulanan" action="laporan_tahunan.php" method="post">
            <select name="jenis" class="form-control" id="jenis" required>
              <option></option>
              <option>Ianah</option>
              <option>Katering</option>
            </select>

            <select type="text" name="tahun" class="form-control" id="tahun" required>
              <option></option>
              <?php foreach ($sql as $data) { ?>
              <option><?php echo $data['tahun']; ?></option>
              <?php } ?>
            </select>

            <select name="kamar" class="form-control" id="kamar">
              <option></option>
              <option value="A">Kamar A</option>
              <option value="B">Kamar B</option>
              <option value="C">Kamar C</option>
              <option value="D">Kamar D</option>
              <option value="E">Kamar E</option>
              <option value="F">Kamar F</option>
              <option value="G">Kamar G</option>
              <option value="H">Kamar H</option>
              <option value="I">Kamar I</option>
              <option value="Al Hadi">Kamar Al Hadi</option>
              <option value="Al Jabbar">Kamar Al Jabbar</option>
              <option value="Al Lathif">Kamar Al Lathif</option>
              <option value="Al Mujib">Kamar Al Mujib</option>
              <option value="An Nafi">Kamar An Nafi</option>
              <option value="As Salam">Kamar As Salam</option>
              <option value="An Nur">Kamar An Nur</option>
              <option value="Al Baits">Kamar Al Baits</option>
              <option value="Ar Rohman">Kamar Ar Rohman</option>
              <option value="Al Hakim">Kamar Al Hakim</option>
              <option value="Al Hafidz">Kamar Al Hafidz</option>
              <option value="Koperasi">Kamar Koperasi</option>
            </select>

            <select name="angkatan" class="form-control" id="angkatan">
              <option></option>
              <option>Sakinah</option>
              <option>Mumarosah</option>
            </select>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
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
        $('#jenis').select2({
          placeholder : 'Pilih Jenis Pembayaran',
          minimumResultsForSearch: Infinity,
          width:'20%',
          theme : 'bootstrap'
        });
        $('#tahun').select2({
          placeholder : 'Pilih Tahun',
          minimumResultsForSearch: Infinity,
          width:'20%',
          theme : 'bootstrap'
        });
        $('#kamar').select2({
          placeholder : 'Pilih Kamar (opsional)',
          minimumResultsForSearch: Infinity,
          width:'20%',
          theme : 'bootstrap'
        });
        $('#angkatan').select2({
          placeholder : 'Pilih Angkatan (opsional)',
          minimumResultsForSearch: Infinity,
          width:'20%',
          theme : 'bootstrap'
        });
      });
    </script>
  </body>
</html>
