<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>pelatihan/add" class="pull-right"><button class="btn btn-primary"><i
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
                            <th>Nama Pengaju</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($pelatihan as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['waktu_pelatihan'])));?></td>
                            <td><?=$row['nama'];?></td>
                            <td><?=$row['lokasi_pelatihan'];?></td>
                            <td><?=$row['hp_panitia'];?></td>
                            <td>
                                <?php if ($row['dilaksanakan']==0) {
                                    echo '<a class="text-danger">Belum Dilaksanakan</a>';
                                } else {
                                    echo '<a class="text-success">Sudah Dilaksanakan <br> <small> dengan <b> pemateri '.$row['pemateri'].' </b></small></a>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?=site_url()?>pelatihan/edit/<?=$row['id_pelatihan']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>pelatihan/delete/<?=$row['id_pelatihan']?>"><button
                                        class="btn btn-danger"
                                        onclick="return confirm('Hapus data pelatihan <?=$row['nama'];?> ?')"><i
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