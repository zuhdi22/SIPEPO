<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
<script src="../assets/js/morris/chart-data-morris.js"></script>
<script src="../assets/js/tablesorter/jquery.tablesorter.js"></script>
<script src="../assets/js/tablesorter/tables.js"></script>
<!-- select2 -->
<script src="../assets/select2/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function(){
    $('#jenis_bayar').select2({
      placeholder : 'Pilih Jenis Pembayaran',
      minimumResultsForSearch: Infinity,
      width :'100%',
      theme : 'bootstrap'
    });
    $('#bulan').select2({
      placeholder : 'Pilih Bulan',
      minimumResultsForSearch: Infinity,
      width :'100%',
      theme : 'bootstrap'
    });
    $('#tahun').select2({
      placeholder : 'Pilih Tahun',
      minimumResultsForSearch: Infinity,
      width :'100%',
      theme : 'bootstrap'
    });
    $('#ket').select2({
      placeholder : 'Pilih Keterangan',
      minimumResultsForSearch: Infinity,
      width :'100%',
      theme : 'bootstrap'
    });
  });
</script>
