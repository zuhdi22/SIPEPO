<?php

session_start();
if (empty($_SESSION['username'])){
  header('location:../index.html');
}
else {
  include "../koneksi.php";
  include "../sekre/model/headerharian.php";
?>
 <?php } ?>
     <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan harian <small>SIPEPO </small></h1>
            <br/>
            <!-- <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             Silahkan pilih tanggal yang diinginkan
          </div> -->
          <form class="form-inline" name="form_harian" action="laporan_harian.php" method="post">
            <div class="form-group">
            <label class="control-label"> Pilih Tanggal :  </label>
            </div>
            <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
              <input type="text" class="form-control" name="harian" id="harian">
            </div>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </form>
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
      $('#harian').daterangepicker({
        locale:{
          format : 'YYYY/MM/DD',
          applyLabel : 'Terapkan',
          cancelLabel : 'batal',
          customRangeLabel : 'Rentang Khusus',
          daysOfWeek : [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
          monthNames :[
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          ],
          firstDay:1
        },
        ranges: {
          'Hari ini':[
            moment(new Date),
            moment(new Date),
          ],
        },
        alwaysShowCalendars:true,
        opens:'center'

      })
    });
  </script>
  </body>
</html>
