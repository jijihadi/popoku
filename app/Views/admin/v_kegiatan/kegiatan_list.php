<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>kegiatan/add" class="pull-right"><button class="btn btn-primary"><i
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
                            <th>Tanggal</th>
                            <th>Nama Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($kegiatan as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=tgl_indo(date('Y-m-d', strtotime($row['tanggal_kegiatan'])));?></td>
                            <td><?=$row['nama_kegiatan'];?></td>
                            <td><?=$row['lokasi_kegiatan'];?></td>
                            <td><?=$row['deskripsi_kegiatan'];?></td>
                            <td><img src="<?=site_url()?>assets/file_upload/kegiatan/<?=$row['foto_kegiatan'];?>"  style="max-width:250px;"></td>
                            <td>
                                <a href="<?=site_url()?>kegiatan/edit/<?=$row['id_kegiatan']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>kegiatan/delete/<?=$row['id_kegiatan']?>"><button
                                        class="btn btn-danger"
                                        onclick="return confirm('Hapus data kegiatan <?=$row['nama'];?> ?')"><i
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