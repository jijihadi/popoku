<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-6">
                    <?=$title?>
                </div>
                <div class="col-6">
                    <div role="group" class="btn-group-sm nav btn-group">
                        <a data-toggle="tab" href="#user" class="btn-shadow active btn btn-primary">Kategori User</a>
                        <a data-toggle="tab" href="#produk" class="btn-shadow  btn btn-primary">Kategori Produk</a>
                        <a data-toggle="tab" href="#kapasitas" class="btn-shadow  btn btn-primary">Kategori
                            Kapasitas</a>
                    </div>
                </div>

            </div>
            <div class="card-body" style="overflow: scroll;">
                <div class="tab-content">
                    <div class="tab-pane active" id="user" role="tabpanel">
                        <?php if (session()->getFlashdata('msg')): ?>
                        <?=session()->getFlashdata('msg')?>
                        <?php endif;?>

                        <a href="<?=site_url()?>kategori/add/user" class="pull-right"><button class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Tambah Data</button></a>
                        <table id="table1" class="table table-stripped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($user as $row): ?>
                                <tr>
                                    <td><b><?=$i;?></b></td>
                                    <td><?=$row['level'];?></td>
                                    <td>
                                        <a href="<?=site_url()?>kategori/edit/user/<?=$row['id_level']?>"><button
                                                class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                        <a href="<?=site_url()?>kategori/delete/user/<?=$row['id_level']?>"><button
                                                class="btn btn-danger"
                                                onclick="return confirm('Hapus data Kategori <?=$row['level'];?> ?')"><i
                                                    class="fa fa-trash"></i>
                                                Delete</button></a>
                                    </td>
                                </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="produk" role="tabpanel">
                        <?php if (session()->getFlashdata('msg')): ?>
                        <?=session()->getFlashdata('msg')?>
                        <?php endif;?>

                        <a href="<?=site_url()?>kategori/add/produk" class="pull-right"><button
                                class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                        <table id="table2" class="table table-stripped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori Produk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($kategori as $row): ?>
                                <tr>
                                    <td><b><?=$i;?></b></td>
                                    <td><?=$row['nama_kategori'];?></td>
                                    <td>
                                        <a href="<?=site_url()?>kategori/edit/produk/<?=$row['id_kategori']?>"><button
                                                class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                        <a href="<?=site_url()?>kategori/delete/produk/<?=$row['id_kategori']?>"><button
                                                class="btn btn-danger"
                                                onclick="return confirm('Hapus data Kategori <?=$row['nama_kategori'];?> ?')"><i
                                                    class="fa fa-trash"></i>
                                                Delete</button></a>
                                    </td>
                                </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                    </div><!-- end isi tab-->
                    <div class="tab-pane" id="kapasitas" role="tabpanel">
                        <?php if (session()->getFlashdata('msg')): ?>
                        <?=session()->getFlashdata('msg')?>
                        <?php endif;?>

                        <a href="<?=site_url()?>kategori/add/kapasitas" class="pull-right"><button
                                class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                        <table id="table3" class="table table-stripped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori Kapasitas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($kapasitas as $row): ?>
                                <tr>
                                    <td><b><?=$i;?></b></td>
                                    <td><?=$row['nama_level_kapasitas'];?></td>
                                    <td>
                                        <a href="<?=site_url()?>kategori/edit/kapasitas/<?=$row['id_level_kapasitas']?>"><button
                                                class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                        <a href="<?=site_url()?>kategori/delete/kapasitas/<?=$row['id_level_kapasitas']?>"><button
                                                class="btn btn-danger"
                                                onclick="return confirm('Hapus data Kategori <?=$row['nama_level_kapasitas'];?> ?')"><i
                                                    class="fa fa-trash"></i>
                                                Delete</button></a>
                                    </td>
                                </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                    </div><!-- end isi tab-->
                </div><!-- End tab pane-->
            </div>
        </div>
    </div>
</div>
</div>
</div>