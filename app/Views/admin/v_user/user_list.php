<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>user/add" class="pull-right"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button></a>
                </div>
            </div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <table id="table1" class="table table-stripped dataTable dtr-inline" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Level User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($customer as $row): 
                                if ($row['id_level'] == 1) {
                                    $lev = 'Super Admin';
                                } else if ($row['id_level'] == 2) {
                                    $lev = 'Admin';
                                } else if ($row['id_level'] == 3) {
                                    $lev = 'Kurir';
                                } else if ($row['id_level'] == 4) {
                                    $lev = 'User';
                                }
                                
                            ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=$row['nama'];?></td>
                            <td><?=$row['email'];?></td>
                            <td><?=$lev;?></td>
                            <td>
                                <a href="<?=site_url()?>user/edit/<?=$row['id_user']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>user/delete/<?=$row['id_user']?>"><button class="btn btn-danger"
                                        onclick="return confirm('Hapus data user <?=$row['nama'];?> ?')"><i class="fa fa-trash"></i>
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