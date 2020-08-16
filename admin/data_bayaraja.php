<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
  include "../admin/controller/controller_bayaraja.php";
  include "../admin/model/header.php";

?>

     <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Data Pembayaran<small> Santri</small></h1>
            <!-- <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Untuk cetak slip pembayaran silahkan klik tombol cetak.!
          </div>
        </div> -->
      <form class="form-inline" name="form_data_bayaraja" action="laporan_bayar.php" method="post">
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

                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                   </form>
                 </div><!-- /.row -->

                  <!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <?php
      include "../admin/model/footerbayaraja.php";
    ?>
  </body>
  </html>
