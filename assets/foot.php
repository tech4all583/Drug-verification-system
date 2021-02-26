            </div>
        </div>
    </div>
<footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div> -->
    <span>Copyright &copy; 2020 - <?= date('Y'); ?>  <a href="<?= base_url()  ?>" target="_blank"><?= WEB_TITLE ?></a>.</span> All rights
    reserved.
</footer>
</div>

<!-- /.control-sidebar -->
<!-- jQuery 3 -->
<script src="<?= LIB_TEMPLATE ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= LIB_TEMPLATE ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= LIB_TEMPLATE ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- PACE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= LIB_TEMPLATE ?>bower_components/PACE/pace.min.js"></script>
<script src="<?= LIB_TEMPLATE  ?>dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= LIB_TEMPLATE ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= LIB_TEMPLATE ?>bower_components/morris.js/morris.min.js"></script>
<!-- DataTables -->
<script src="<?= LIB_TEMPLATE ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= LIB_TEMPLATE ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= LIB_TEMPLATE ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- Slimscroll -->
<script src="<?= LIB_TEMPLATE ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= LIB_TEMPLATE ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= LIB_TEMPLATE ?>dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?= LIB_TEMPLATE ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= LIB_TEMPLATE ?>dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="<?= LIB_TEMPLATE ?>bower_components/moment/moment.js"></script>
<script src="<?= LIB_TEMPLATE ?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    })
</script>
</body>
</html>