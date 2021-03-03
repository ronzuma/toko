<!-- Change Password -->


<div class="modal fade" id="change_password">
	<div class="modal-dialog modal-sm">
		<form id='form_proses_change_pass'>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-sm-12 col-md-12 col-form-label">Password Lama:</label>
					<div class="col-sm-12 col-md-12">
						<input class="form-control" type="password" name="lama" id="lama" >
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-12 col-md-12 col-form-label">Password Baru:</label>
					<div class="col-sm-12 col-md-12">
						<input class="form-control" type="password" name="baru" id="baru" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 col-md-12 col-form-label">Konfirmasi Password:</label>
					<div class="col-sm-12 col-md-12">
						<input class="form-control" type="password" name="konfirmasi" id="konfirmasi" >
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success swalDefaultSuccess" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-info" onclick="change_pass()" data-dismiss="modal">Change
				</button>
			</div>
		</div>
		</form>
	</div>
</div>
		

<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>