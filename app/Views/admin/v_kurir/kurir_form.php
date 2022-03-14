<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php
                    $nama = '';
                    $id_user = '';
                    $lokasi = '';
                    $plat_nomor = '';
                    $foto = '';
                    $pp = '';
                    $form = 'kurir/save';
                    // print_r($user);
                    if (!empty($kurir)) {
                        foreach ($kurir as $row):
                            $nama = $row['nama'];
                            $id_user = $row['id_user'];
                            $lokasi = $row['lokasi_kurir'];
                            $plat_nomor = $row['plat_nomor_kurir'];
                            $foto = $row['foto_kurir'];
                            $pp = '<img src="'.site_url().'/assets/file_upload/foto/'.$foto.'"  style="max-width:200px;">';
                            $form = 'kurir/update/' . $row['id_kurir'];
                        endforeach;
                    }
                ?>
                <form action="<?=site_url() . $form?>" method="post" enctype="multipart/form-data">
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <?=$pp?>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Nama User</label>
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
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Alamat Kurir</label>
                        <div class="col-sm-10"><textarea name="lokasi" id="examplealamat"
                                class="form-control autosize-input"><?=$lokasi?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Plat Nomor</label>
                        <div class="col-sm-10"><input name="plat_nomor" id="exampleNama" type="text"
                                class="form-control" style="text-transform:uppercase" value="<?=$plat_nomor?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleFile"
                            class="col-sm-2 col-form-label">Foto Kurir</label>
                        <input name="oldfoto" id="exampleNama" type="hidden" class="form-control" value="<?=$foto?>">
                        <div class="col-sm-10"><input name="foto" id="exampleFile" type="file" class="form-control-file"
                                placeholder="ini nama file">
                            <span id="fotoname"></span>
                            <small class="form-text text-muted">Foto harus berupa <b>Format .JPG, .PNG atau .JPEG</b>.</small>
                        </div>
                    </div>
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