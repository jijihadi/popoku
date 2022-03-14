<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>kurir/add" class="pull-right"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button></a>
                </div>
            </div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <table id="table1" class="table table-stripped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Kurir</th>
                            <th>Lokasi</th>
                            <th>Plat Nomor</th>
                            <th>Kapasitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($kurir as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><img src="<?=site_url()?>assets/file_upload/foto/<?=$row['foto_kurir'];?>"
                                    style="max-width:100px;"></td>
                            <td><?=$row['nama'];?></td>
                            <td><?=$row['lokasi_kurir'];?></td>
                            <td><?=$row['plat_nomor_kurir'];?></td>
                            <td>
                                <?php 
                                    if ($row['nama_level_kapasitas']=='') :
                                        echo '<i>Data kapasitas belum ada</i>';
                                    else:
                                ?>
                                <b>Tingkat <?=$row['nama_level_kapasitas'];?></b>
                                <li>Kapasitas Max: <b><?=$row['kapasitas_max'];?></b></li>
                                <li>Kapasitas Tersisa: <b><?=$row['kapasitas_sisa'];?></b></li>
                                <li>Kapasitas Sekarang: <b><?=$row['kapasitas_sekarang'];?></b></li>
                                <?php endif;?>
                            </td>
                            <td>
                                <a href="<?=site_url()?>kurir/kapasitas/<?=$row['id_kurir']?>"><button
                                        class="btn btn-success"><i class="fa fa-eye"></i> Kapasitas</button></a>
                                <a href="<?=site_url()?>kurir/edit/<?=$row['id_kurir']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>kurir/delete/<?=$row['id_kurir']?>"><button
                                        class="btn btn-danger"
                                        onclick="return confirm('Hapus data kurir <?=$row['nama'];?> ?')"><i
                                            class="fa fa-trash"></i>
                                        Delete</button></a>
                            </td>
                        </tr>
                        <?php $i++;endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>