<?php

session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
  $host = 'localhost'; // Nama hostnya
  $username = 'root'; // Username
  $password = ''; // Password (Isi jika menggunakan password)
  $database = 'durrotua_dbsantri'; // Nama databasenya
  $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
  $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

  $limit = 5; // Jumlah data per halamanya
                // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
  $limit_start = ($page - 1) * $limit;

  $no = $limit_start + 1;
  include "../sekre/model/header.php";
?>

 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Halaman Utama <small>utama </small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Halaman Utama </li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Selamat Datang Di Halaman utama... Anda bisa mencari akun, edit, hapus dan menambahkan daftar santri
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
                <h3 class="panel-title"><i class="fa fa-user"></i> Data Santri </h3>
              </div>
              <br>
                   <form class="form-horizontal" role="search" method="get" action="index.php?controller/cari-akun">
        <div class="col-md-3 col-xs-12">
            <input type="text" name="keyword" class="form-control" placeholder="Cari Akun Disini...">
        </div>
        <div class="text-left">
            <button class="btn btn-default" type="submit" name="submit-cari-akun" value="keyword">Cari Akun</button>
        </div>
    </form>
              <div class="panel-body">
                 <div class="table-responsive">
                    <?php
                if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
              echo "<b>Hasil pencarian : ".$keyword."</b>";
}
?>

                  <table class="table table-bordered table-hover table-striped tablesorter table-paginate">

                      <thead>
                        <th>No<i></i></th>
                        <th>NIS<i></i></th>
                        <th>Nama<i></i></th>
                        <th>Alamat <i</i></th>
                        <th>Kamar <i></i></th>
                        <th>Angkatan <i></i></th>
                        <th>Orang Tua <i></i></th>
                        <th>Telepon Wali <i></i></th>
                        <th>Aksi <i></i></th>
                      </thead>
                        <?php
                       if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        $tampil = mysql_query("select * from santri where nama_santri like '%".$keyword."%' limit $limit_start,$limit");
                         }else{
                       $tampil = mysql_query("select * from santri LIMIT $limit_start,$limit");
                           }if(mysql_num_rows($tampil)){
                          $no = 1;
                        while($data = mysql_fetch_array($tampil))
                        { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama_santri']; ?></a></td>
                    <td><?php echo $data['alamat']; ?></td>
                      <td><?php echo $data['kamar']; ?></td>
                      <td><?php echo $data['angkatan']; ?></td>
                      <td>
                      <?php echo $data['wali']; ?></td>
                    <td>
                      <?php echo $data['no_hp']; ?></td>


                    <td><a class="btn btn-sm btn-primary" href="edit.php?hal=edit&kd=<?php echo $data['id_santri'];?>"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="controller/hapus.php?hal=hapus&kd=<?php echo $data['id_santri'];?>" onclick="return confirm('Apakah anda akan menghapus?');" ><i class="fa fa-power-off"></i> Hapus</a></td>
                      </tr>
                      <?php
                      $no++;
                        } ?>
                   </tbody>
                   </table>

                                      </div>
                                   <div class="text-right">
                                     <a href="tambah.php" class="btn btn-sm btn-warning">Tambah Data Santri <i class="fa fa-arrow-circle-right"></i></a>
                                   </div>
                                   <ul class="pagination">
                   </div>
                  <ul class="pagination">
                            <!-- LINK FIRST AND PREV -->
                            <?php
                            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
                            ?>
                                <li class="disabled"><a href="#">First</a></li>
                                <li class="disabled"><a href="#">&laquo;</a></li>
                            <?php
                            } else { // Jika buka page ke 1
                                $link_prev = ($page > 1) ? $page - 1 : 1;
                            ?>
                                <li><a href="index.php?page=1">First</a></li>
                                <li><a href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                            <?php
                            }
                            ?>

                            <!-- LINK NUMBER -->
                            <?php
                            // Buat query untuk menghitung semua jumlah data
                            $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM santri");
                            $sql2->execute(); // Eksekusi querynya
                            $get_jumlah = $sql2->fetch();

                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
                            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
                            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                $link_active = ($page == $i) ? 'class="active"' : '';
                            ?>
                                <li <?php echo $link_active; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            ?>

                            <!-- LINK NEXT AND LAST -->
                            <?php
                            // Jika page sama dengan jumlah page, maka disable link NEXT nya
                            // Artinya page tersebut adalah page terakhir
                            if ($page == $jumlah_page) { // Jika page terakhir
                            ?>
                                <li class="disabled"><a href="#">&raquo;</a></li>
                                <li class="disabled"><a href="#">Last</a></li>
                            <?php
                            } else { // Jika bukan page terakhir
                                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                            ?>
                                <li><a href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                <li><a href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                            <?php
                          }}else{
             								echo '<tr><td colspan="10">Data Tidak Ditemukan</td></tr>';
             										}
                            ?>
                        </ul>

              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <?php
			include "../sekre/model/footerbiasa.php";
		?>

  </body>
</html>
