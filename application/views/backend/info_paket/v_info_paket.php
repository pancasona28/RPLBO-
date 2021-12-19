<div class="container-fluid">

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

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $judul;?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>                                
                                <th>Info Paket</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            	foreach ($info_paket as $info) {?>
                            		<tr>
                            			<td><?= $info->deskripsi_info_paket;?></td>
                            			<td>
                            				<a href="<?= base_url()?>paket/edit_info_paket/<?= $info->id_info_paket;?>" class="btn btn-success btn-sm">Edit</a>
                            			</td>
                            		</tr>
                            	<?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
