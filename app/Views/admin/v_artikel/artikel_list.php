<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>artikel/add" class="pull-right"><button class="btn btn-primary"><i
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
                            <th>Judul Artikel</th>
                            <th>Headline</th>
                            <th>Tanggal Rilis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($artikel as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=$row['judul'];?></td>
                            <td><img src="<?=site_url()?>assets/file_upload/artikel/<?=$row['headline'];?>"
                                    style="max-width:250px;"></td>
                            <td><?=tgl_indo($row['tanggal_rilis']);?>
                                <?php if ($row['edited']!=0) :?>
                                <span class="badge badge-pill badge-info">edited</span>
                                <?php else:?>
                                <span class="badge badge-pill badge-success">original</span>
                                <?php endif;?>
                            </td>
                            <td>
                                <a href="<?=site_url()?>artikel/edit/<?=$row['id_artikel']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>artikel/delete/<?=$row['id_artikel']?>"><button
                                        class="btn btn-danger"
                                        onclick="return confirm('Hapus data artikel <?=$row['nama'];?> ?')"><i
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