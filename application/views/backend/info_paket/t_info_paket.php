<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>

	<body>
		<div class="container-fluid">
			<h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>
			<div class="card shadow mb-4">
				<div class="card-body">
					<form method="post" action="<?= base_url()?>paket/simpan_info_paket">
						

						<div class="form-group">
							<textarea name="deskripsi_info_paket" class="form-control" cols="30" rows="7"></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Simpan </button>
							<a href="<?= base_url()?>paket/info_paket" class="btn btn-danger"> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>