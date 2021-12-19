<div class="container">
	<div class="row my-5" data-aos="fade-up" data-aos-duration="1000">
		<div class="col-md-4">
			<img class="set-image" src="<?= base_url()?>assets/images/tentang/<?= $tentang['gambar_tentang'];?>">
		</div>

		<div class="col-md-8">
			<h3><?= $tentang['judul_tentang'];?></h3>
			<p><?= $tentang['deskripsi_tentang'];?></p>
		</div>
	</div>

	<div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
		<div class="col-md-12">
			<h3>Jenis Paket</h3>
			<p>
				<?= $info_paket['deskripsi_info_paket'];?>
			</p>

			<table class="table table-bordered">
			  <thead>
			    <tr class="th-warna">
			      <th scope="col">No. </th>
			      <th scope="col">Nama Paket</th>
			      <th scope="col">Harga Paket</th>
			    </tr>
			  </thead>

			  <tbody>
			    <?php 
			    	$no =1;
			    	foreach ($paket as $pkt) {?>
			    		<tr>
			    			<td><?= $no++;?></td>
			    			<td><?= $pkt->nama_paket;?></td>
			    			<td><?= "Rp. ". number_format($pkt->harga_paket,0,'.','.');?></td>
			    		</tr>
			    	<?php }
			    ?>
			    
			  </tbody>
			</table>
		</div>
	</div>
</div>