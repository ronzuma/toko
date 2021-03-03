<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fas fa-th-large"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('Secure/logout') ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt"></i> Sign Out
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" data-toggle="modal" data-target="#change_password">
					<i class="fas fa-cogs"></i> Change Password
				</a>
			</div>
		</li>
	</ul>

</nav>
<!-- /.navbar -->

