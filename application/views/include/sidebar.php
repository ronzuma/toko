<?php
	$controller = $this->router->fetch_class();
	$level = $this->session->userdata('ap_level');
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo config_item('assets'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $this->session->userdata('ap_nama')?></a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">		
				<li class="nav-item">
					<a href="<?= base_url('Inventory') ?>" class="nav-link">
						<i class="nav-icon fas fa-edit"></i>
						<p>Inventori</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-percentage"></i>
						<p>Promosi</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Toko') ?>" class="nav-link">
						<i class="nav-icon fas fa-store-alt"></i>
						<p>Toko</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Supplier') ?>" class="nav-link">
						<i class="nav-icon fas fa-parachute-box"></i>
						<p>Supplier</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('penjualan') ?>" class="nav-link">
						<i class="nav-icon fa fa-shopping-cart"></i>
						<p>Penjualan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pembelian') ?>" class="nav-link">
						<i class="nav-icon fa fa-shopping-bag"></i>
						<p>Pembelian</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-line"></i>
						<p>Pendapatan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-bar"></i>
						<p>Pengeluaran</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('User') ?>" class="nav-link">
						<i class="nav-icon fas fa-users-cog"></i>
						<p>User</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Param') ?>" class="nav-link">
						<i class="nav-icon fas fa-cog"></i>
						<p>Parameter</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>