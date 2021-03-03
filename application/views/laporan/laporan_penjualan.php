<?php if($penjualan->num_rows() > 0) { ?>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal</th>
				<th>Nama Barang</th>
				<th>Qty</th>
				<th>Kasir</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$total_penjualan = 0;
			foreach($penjualan->result() as $p)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".date('d/m/Y', strtotime($p->tanggal))."</td>
						<td>".$p->nama_barang."</td>
						<td>".$p->jumlah."</td>
						<td>".$p->kasir."</td>
						<td>Rp. ".str_replace(",", ".", number_format($p->sub_total))."</td>
					</tr>
				";

				$total_penjualan = $total_penjualan + $p->sub_total;
				$no++;
			}

			echo "
				<tr>
					<td colspan='5'><b>Total Seluruh Penjualan</b></td>
					<td><b>Rp. ".str_replace(",", ".", number_format($total_penjualan))."</b></td>
				</tr>
			";
			?>
		</tbody>
	</table>

	<p>
		<?php
		$from 	= date('Y-m-d', strtotime($from));
		$to		= date('Y-m-d', strtotime($to));
		?>
		<a href="<?php echo site_url('Report/pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-default'><img src="<?php echo config_item('img'); ?>pdf.png"> Export ke PDF</a>
	</p>
	<br />
<?php } ?>

<?php if($penjualan->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>