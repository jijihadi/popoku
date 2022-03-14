<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-8">
                    <?=$title?>
                </div>
            </div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php 
                    // print_r($kapasitas);
                    $kap_max='';
                    $kap_sis='';
                    $kap_sek='';
                    $id_kap ='';
                    foreach ($kapasitas as $row): 
                        $idk        = $row['id_kapasitas'];
                        $id_kap     = $row['id_level_kapasitas'];
                        $kap_max    = $row['kapasitas_max'];
                        $kap_sis    = $row['kapasitas_sisa'];
                        $kap_sek    = $row['kapasitas_sekarang'];
                    endforeach;
                ?>
                <table class="table table-stripped dataTable dtr-inline">
                    <form action="<?=site_url()?>kurir/update_kapasitas/<?=$idd?>" method="post">
                        <thead>
                            <tr>
                                <th width="20%">Nama Kurir</th>
                                <th width="1%">:</th>
                                <th><?=ucwords($nama)?></th>
                            </tr>
                            <tr>
                                <th>Level Kapasitas</th>
                                <th>:</th>
                                <th>
                                    <select name="id_level_kapasitas" id="examplelevel" class="form-control"
                                        placeholder="Pilih level...">
                                        <option value="">pilih salah satu</option>
                                        <?php $i = 1;foreach ($level_kap as $l): ?>
                                        <option <?php if ($l['id_level_kapasitas'] == $id_kap) {echo 'selected';}?>
                                            value="<?=$l['id_level_kapasitas'];?>"><?=$l['nama_level_kapasitas'];?>
                                        </option>
                                        <?php $i++;endforeach;?>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Kapasitas Maksimal</th>
                                <th>:</th>
                                <th><input name="max" id="exampleNama" type="text" class="form-control"
                                        value="<?=$kap_max?>">
                                </th>
                            </tr>
                            <tr>
                                <th>Kapasitas Sisa</th>
                                <th>:</th>
                                <th><input name="sisa" id="exampleNama" type="text" class="form-control"
                                        value="<?=$kap_sis?>">
                                </th>
                            </tr>
                            <tr>
                                <th>Kapasitas Sekarang</th>
                                <th>:</th>
                                <th><input name="now" id="exampleNama" type="text" class="form-control"
                                        value="<?=$kap_sek?>">
                                </th>
                            </tr>
                        </thead>
                </table>
                <div class="card-footer">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary pull-right" style="margin-left:2em;">
                            <i class="fa fa-check"></i>
                            Simpan
                        </button>
                        <a href="<?=site_url()?>kurir/" class="btn btn-secondary pull-right">
                            <i class="fa fa-times"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>