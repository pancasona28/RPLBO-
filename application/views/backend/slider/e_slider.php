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
					<form method="post" action="<?= base_url()?>slider/update" enctype="multipart/form-data">
						
						<div class="form-group" hidden="">
							<input type="text" name="id_slider" value="<?= $slider['id_slider'];?>" class="form-control" placeholder="Input Judul Slider" required>
						</div>

						<div class="form-group">
							<input type="text" name="judul_slider" value="<?= $slider['judul_slider'];?>" class="form-control" placeholder="Input Judul Slider" required>
						</div>

						<div class="form-group">
							<textarea name="deskripsi_slider" class="form-control" cols="30" rows="6" placeholder="input Deskripsi Slider" required><?= $slider['deskripsi_slider'];?></textarea>
						</div>

						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar_slider" class="form-control mb-2">
							<img src="<?= base_url()?>assets/images/slider/<?= $slider['gambar_slider'];?>" width="400"><br>
							<small style="color: red;">upload gambar dengan format (jpg | jpeg | png) dengan ukuran (1440 x 500) </small>
						</div>


						<div class="form-group">
							<select name="status_slider" class="form-control" required>
								<?php 
									if ($slider['status_slider'] == "Aktif") {?>										
										<option value="Aktif" selected> Aktif</option>
										<option value="Tidak Aktif"> Tidak Aktif</option>
									<?php }else{?>
										<option value="Aktif"> Aktif</option>
										<option value="Tidak Aktif" selected> Tidak Aktif</option>
									<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Update </button>
							<a href="<?= base_url()?>slider" class="btn btn-danger"> Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>