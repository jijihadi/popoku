<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if(session()->getFlashdata('msg')):?>
                <?= session()->getFlashdata('msg') ?>
                <?php endif;?>
                <?php
                    $nama       = '';
                    $nohp       = '';
                    $email      = '';
                    $password   = '';
                    $alamat     = '';
                    $levelid    = '';
                    $form       ='user/save';
                    // print_r($user);
                    if (!empty($user)) {
                        foreach ($user as $row):
                            $nama       = $row['nama'];
                            $nohp       = $row['no_hp'];
                            $email      = $row['email'];
                            $password   = $row['password'];
                            $alamat     = $row['alamat'];
                            $levelid    = $row['id_level'];
                            $form       ='user/update/'.$row['id_user'];
                        endforeach;
                    }
                    ?>
                <form action="<?=site_url().$form?>" method="post">
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10"><input name="nama" id="exampleNama" type="text" class="form-control"
                                value="<?=$nama?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-10"><input name="no_hp" id="exampleNama" type="text" class="form-control"
                                value="<?=$nohp?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10"><input name="email" id="exampleEmail" type="email" class="form-control" readonly
                                value="<?=$email?>">
                            <small class="form-text text-muted">Email akan digunakan untuk login akun anda.</small>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="examplePassword"
                            class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10"><input name="password" id="examplePassword" type="password"
                                class="form-control">
                            <?php if($password!=''):?>
                            <small class="form-text text-muted">Kosongi password jika tidak ingin merubah
                                password.</small>
                            <?php endif;?>
                        </div>
                        <input name="oldpassword" type="hidden" class="form-control" value="<?=$password?>">
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10"><textarea name="alamat" id="examplealamat"
                                class="form-control autosize-input" rows="1"><?=$alamat?></textarea>
                        </div>
                    </div>
                    <!-- <div class="position-relative row form-group"><label for="exampleFile"
                            class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10"><input name="file" id="exampleFile" type="file"
                                class="form-control-file">
                            <small class="form-text text-muted">This is some placeholder block-level help text for the
                                above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                    </div> -->
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