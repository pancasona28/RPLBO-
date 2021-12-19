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
					<form method="post" action="<?= base_url()?>tentang/simpan" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="judul_tentang" class="form-control" placeholder="Input Judul Tentang" required>
						</div>

						<div class="form-group">
							<textarea name="deskripsi_tentang" class="form-control" cols="30" rows="6" placeholder="input Deskripsi Tentang" required></textarea>
						</div>

						<div class="form-group">
							<input type="file" name="gambar_tentang" class="form-control" required>
							<small class="text-danger">ukuran gambar (350 pixel X 250 pixel) type gambar (jpg | png)</small>
						</div>						

						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Simpan </button>
							<a href="<?= base_url()?>tentang" class="btn btn-danger"> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>