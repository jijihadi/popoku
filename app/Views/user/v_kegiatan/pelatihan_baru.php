<!-- datetime -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <h3><?=$title?></h3>
                    <p>
                        <a href="<?=site_url()?>userhome" style="color:white;">Home</a>&rarr;
                        <a style="color:white;">Donasi</a>&rarr;
                        <a style="color:white;"><?=$title?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <form class="row contact_form" action="<?=site_url()?>userhome/simpan_pelatihan" method="post"
                    id="contactForm" novalidate="novalidate">
                    <div class="col-md-12">
                        <h3>Data Pelatihan</h3>
                        <hr>
                        <div class="form-group">
                            <input name="nama_user" type="text" class="form-control" value="<?=session()->get('nama')?>"
                                readonly>
                            <input name="id_user" type="hidden" class="form-control"
                                value="<?=session()->get('user_id')?>">
                        </div>
                        <div class="form-group">
                            <input name="waktu_pelatihan" id="exampledatepicker" type="text" class="form-control"
                                placeholder="Tanggal Diadakan">
                        </div>
                        <div class="form-group">
                            <input name="hp_panitia" type="text" class="form-control" placeholder="Nomor Telfon Panitia">
                            <input name="pemateri" type="hidden" class="form-control" placeholder="Nomor Telfon Panitia">
                        </div>
                        <div class="form-group">
                            <textarea name="lokasi_pelatihan" id="examplealamat" class="form-control autosize-input"
                                placeholder="Lokasi dimana acara akan dilaksanakan"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Buat Pelatihan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- moment -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- leaflet -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

<script>
    $(function () {
        // datetimepicker
        document.getElementById("exampledatepicker").flatpickr({
            "enableTime": true,
            minDate: "today"
        });
    });
</script>