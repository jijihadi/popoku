<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php
                    $id_user = '';
                    $waktu = '';
                    $lokasi = '';
                    $hp = '';
                    $pemateri = '';
                    $dilaksanakan = '';
                    $form = 'pelatihan/save';
                    // print_r($user);
                    if (!empty($pelatihan)) {
                        foreach ($pelatihan as $row):
                            $id_user = $row['id_user'];
                            $waktu = $row['waktu_pelatihan'];
                            $lokasi = $row['lokasi_pelatihan'];
                            $hp = $row['hp_panitia'];
                            $pemateri = $row['pemateri'];
                            $dilaksanakan = $row['dilaksanakan'];
                            $form = 'pelatihan/update/' . $row['id_pelatihan'];
                        endforeach;
                    }
                ?>
                <form action="<?=site_url() . $form?>" method="post" enctype="multipart/form-data">
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Nama Pengaju</label>
                        <div class="col-sm-10"><select name="id_user" id="examplelevel" class="form-control"
                                placeholder="Pilih user...">
                                <option value="">pilih salah satu</option>
                                <?php $i = 1;foreach ($user as $l): ?>
                                <option <?php if ($l['id_user'] == $id_user) {echo 'selected';}?>
                                    value="<?=$l['id_user'];?>"><?=$l['nama'];?></option>
                                <?php $i++;endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                        <div class="col-sm-10">
                        <input name="waktu" id="exampledatepicker" type="text"
                                class="form-control" value="<?=$waktu?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Lokasi Pelatihan</label>
                        <div class="col-sm-10"><textarea name="lokasi" id="examplealamat"
                                class="form-control autosize-input"><?=$lokasi?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nomor Hp Panitia</label>
                        <div class="col-sm-10"><input name="hp" id="exampleNama" type="text"
                                class="form-control" value="<?=$hp?>">
                        </div>
                    </div>
                    <?php if (!empty($pelatihan)): ?>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Pemateri</label>
                        <div class="col-sm-10"><input name="pemateri" id="exampleNama" type="text"
                                class="form-control" value="<?=$pemateri?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10"><select name="dilaksanakan" id="exampleselect" class="form-control"
                                placeholder="Pilih user...">
                                <option value="">-pilih salah satu-</option>
                                <option value="1" <?php if ($dilaksanakan == 1) {echo 'selected';}?>>Sudah Dilaksanakan</option>
                                <option value="0" <?php if ($dilaksanakan == 0) {echo 'selected';}?>>Belum Dilaksanakan</option>
                            </select>
                        </div>
                    </div>
                    <?php endif;?>
                    <div class="position-relative row form-check">
                        <div class="col-12 ">
                            <button class="btn btn-success btn-lg pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>