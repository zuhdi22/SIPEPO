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
