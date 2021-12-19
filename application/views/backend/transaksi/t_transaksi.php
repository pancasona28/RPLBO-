<?php 
	date_default_timezone_set('Asia/Jakarta');
	$tgl_masuk = date('Y-m-d h:i:s');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>

	<body>

		<?php 
	        if (!empty($this->session->flashdata('info'))) {?>
	            <div class="alert alert-success alert-dismissible fade show" role="alert">
	              <strong>Selamat!</strong> <?= $this->session->flashdata('info')?>
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	        <?php }
	    ?>

		<div class="container-fluid">
			<h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>
			<div class="card shadow mb-4">
				<div class="card-body">
					<form method="post" action="<?= base_url()?>transaksi/simpan">
						<div class="form-group">
							<input type="text" name="kode_transaksi" value="<?= "TR".date('Ymd').$kode_transaksi;?>" class="form-control" readonly>
						</div>

						<div class="form-group">
							<select name="kode_konsumen" class="form-control" required>
								<option value="" selected> - Pilih Konsumen - </option>
								<?php 
									foreach ($konsumen as $row) {?>
										<option value="<?= $row->kode_konsumen?>"> <?= $row->nama_konsumen;?> </option>
									<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<select name="kode_paket" id="paket" class="form-control" required>
								<option value="" selected> - Pilih Paket - </option>
								<?php 
									foreach ($paket as $row) {?>
										<option value="<?= $row->kode_paket?>"> <?= $row->nama_paket;?> </option>
									<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<input type="text" id="harga" class="form-control" placeholder="Harga Paket" readonly>
						</div>

						<div class="form-group">
							<input type="number" name="berat" id="berat" class="form-control" placeholder="Berat (KG)">
						</div>

						<div class="form-group">
							<input type="number" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total" readonly>
						</div>

						<div class="form-group" hidden>
							<input type="text" name="tgl_masuk" value="<?= $tgl_masuk;?>" class="form-control" placeholder="Tanggal Masuk" readonly>
						</div>

						<div class="form-group">
							<select name="bayar" class="form-control">
								<option value=""> - Pilih Status Bayar - </option>
								<option value="Lunas"> Lunas</option>
								<option value="Belum Lunas"> Belum Lunas</option>
							</select>
						</div>

						<div class="form-group" hidden>
							<input type="text" name="status" value="Baru" class="form-control" placeholder="Status" readonly>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Simpan </button>
							<a href="<?= base_url()?>konsumen" class="btn btn-danger"> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	</body>
</html>


<script>
	$('#paket').change(function(){
		var kode_paket = $(this).val();	

		$.ajax({
			url : '<?= base_url()?>transaksi/getHargaPaket',
			data : {kode_paket:kode_paket},
			method : 'post',
			dataType : 'JSON',
			success : function(hasil){
				$('#harga').val(hasil.harga_paket);
			}
		});	
	});

	
	$('#berat').keyup(function(){
		var berat = $(this).val();
		var harga = document.getElementById('harga').value;
		$('#grand_total').val(berat * harga);
	});

</script>