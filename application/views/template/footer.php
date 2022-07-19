<footer class="footer mt-auto bg-light text-center text-lg-start">
	<!-- Copyright -->
	<div class="container text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		© 2020 Copyright:
		<a class="text-dark" href="https://mdbootstrap.com/">Mitra Olie Blitar</a>
	</div>
	<!-- Copyright -->
</footer>
</div>
<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/propper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#tabelData').DataTable({
			"order": [
				[1, "desc"]
			],
			"ordering": false
		});
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = $('.date_range_filter').val();
				var max = $('.date_range_filter2').val();
				var createdAt = data[4]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
				if (
					(min == "" || max == "") ||
					(moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
				) {
					return true;
				}
				return false;
			}
		);
		$('.pickdate').each(function() {
			$(this).datepicker({
				format: 'mm/dd/yyyy'
			});
		});
		$('.pickdate').change(function() {
			table.draw();
		});
	});
</script>
<!-- TEST -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('dist/js/demo.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('dist/js/pages/dashboard.js'); ?>"></script>
<!-- !TEST -->
</body>

</html>