<!-- Bootstrap 4 -->
<script src="<?php echo config_item('assets'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo config_item('assets'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo config_item('assets'); ?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo config_item('assets'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo config_item('assets'); ?>dist/js/demo.js"></script>



<script type="text/javascript">
		
	function change_pass(){
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

		$.ajax({
			url : "<?= site_url('User/change_password')?>",
			type: "POST",
			data: $("#form_proses_change_pass").serialize(),
 			success: function(data){
				var json = data,
				obj = JSON.parse(json);

				Toast.fire({
					type: obj.type,
					title: obj.pesan
				})
				
				if (obj.type=='success'){
					window.location.href="<?= site_url('Secure/logout')?>";
				}
			}
		});
	}
		
</script>