<!-- JavaScript -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
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
  $('#nama_santri').select2({
    placeholder : 'Pilih Santri',
    minimumResultsForSearch: Infinity,
    width:'30%',
    theme : 'bootstrap'
  });
});
</script>
