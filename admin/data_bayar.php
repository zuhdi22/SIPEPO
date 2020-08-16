<?php
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";
} else {
	include "../koneksi.php";
	include "../admin/controller/controller_bayar.php";
	include "../admin/model/header.php";
?>
     <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Cetak Slip Pembayaran </h1>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Untuk cetak slip pembayaran silahkan klik tombol print.!
          </div>
        </div>


        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Cetak Slip Pembayaran Santri </h3>
              </div>
								<br>
                   <form class="form-horizontal" role="search" method="get" action="data_bayar.php?controller/cari-bayar">
        <div class="col-md-3 col-xs-12">
            <input type="text" name="keyword" class="form-control" placeholder="Ketik Nama Santri...">
        </div>
        <div class="text-left">
            <button class="btn btn-default" type="submit" name="submit-cari-bayar" value="keyword">Cari Akun</button>
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
              <div class="panel-body">
                 <div class="table-responsive">
                    <?php
                    $tampil=mysql_query("SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.id_bayar, bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.jam_bayar from santri INNER JOIN bayar ON santri.nis=bayar.nis");
                    $total=mysql_num_rows($tampil);
                    ?>
                  <table class="table table-bordered table-hover table-striped tablesorter">
										<thead>
										<th>No<i></i></th>
									  <th>NIS<i></i></th>
                    <th>Nama<i></i></th>
                    <th>Kamar<i></i></th>
                    <th>Angkatan<i></i></th>
										<th>Jenis Pembayaran<i></i></th>
										<th>Bulan<i></i></th>
                    <th>Nominal<i></i></th>
                    <th>Tanggal Bayar <i></i></th>
                    <th>Jam Bayar <i></i></th>
                    <th>Aksi <i></i></th>
                    </tr>
                     <?php
                       if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        $tampil = mysql_query("SELECT * from santri INNER JOIN bayar ON santri.nis=bayar.nis where nama_santri like '%".$keyword."%'");
                         }else{
                       $tampil = mysql_query("SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.id_bayar, bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.jam_bayar from santri INNER JOIN bayar ON santri.nis=bayar.nis limit $limit_start,$limit");
                           }if(mysql_num_rows($tampil)){
                          $no = 1;
                        while($data = mysql_fetch_array($tampil)){ ?>
                    <tr>
												<td><?php echo $no; ?></td>
                      <td class="hidden"><?php echo $data['id_bayar']; ?></td>
                    <td><?php echo $data['nis']; ?></td>
                    <td><?php echo $data['nama_santri']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo $data['angkatan']; ?></td>
                    <td><?php echo $data['jenis_bayar']; ?></td>
                    <td><?php echo formatMonth($data['bulan']);?></td>
                    <td align="right">Rp.<?php echo number_format($data['nominal'],2,',','.').",-";?></td>
                    <td><?php echo formatDate($data['tanggal_bayar']);?></td>
                    <td><?php echo $data['jam_bayar']; ?></td>
										<td>
										<a class="btn btn-sm btn-warning" href="printgaji.php? hal=printgaji&kd=<?php echo $data['id_bayar'];?>"><i class="fa fa-print"></i> Print</a>
									</td>
										</tr>
                 <?php
								 	$no++;
							 }?>
                   </tbody>
                   </table>
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
	                                 <li><a href="data_bayar.php?page=1">First</a></li>
	                                 <li><a href="data_bayar.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
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
	                                 <li <?php echo $link_active; ?>><a href="data_bayar.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
	                                 <li><a href="data_bayar.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
	                                 <li><a href="data_bayar.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
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
			include "../admin/model/footerbiasa.php";
		?>

  </body>
</html>
