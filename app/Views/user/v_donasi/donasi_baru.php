<!-- datetime -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
<!-- map -->
<!-- map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<style>
    #map {
        height: 24em;
    }
</style>

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
                <form class="row contact_form" action="<?=site_url()?>userhome/simpan_donasi" method="post"
                    id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <h3>Data Donatur</h3>
                        <div class="form-group">
                            <input name="nama_user" type="text" class="form-control" value="<?=session()->get('nama')?>"
                                readonly>
                            <input name="id_user" type="hidden" class="form-control"
                                value="<?=session()->get('user_id')?>">
                        </div>
                        <div class="form-group">
                            <input name="tanggal_pengajuan" id="exampledatepicker" type="text" class="form-control"
                                placeholder="Tanggal Diambil">
                        </div>
                        <div class="form-group">
                            <input name="jumlah_donasi" id="exampleNama" type="number" class="form-control"
                                placeholder="Jumlah Donasi">
                        </div>
                        <div class="form-group">
                            <textarea name="alamat_jemput" id="examplealamat" class="form-control autosize-input"
                                placeholder="Tambahkan detail alamat seperti warna rumah, acuan, dsb."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Lokasi Penjemputan</h3>
                            <div id="map"></div>
                            <input name="lati" id="lat" type="hidden" class="form-control">
                            <input name="longi" id="long" type="hidden" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Jadi Donatur</button>
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

        // map
        var map = L.map('map');
        var marker;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a>Popokku</a>'
        }).addTo(map);

        watch: true;

        function onLocationFound(e) {
            marker = new L.Marker(e.latlng, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);

            $('#lat').val(e.latlng.lat);
            $('#long').val(e.latlng.lng);
        }

        function onMapClick(e) {
            map.removeLayer(marker);
            marker = new L.Marker(e.latlng, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);

            $('#lat').val(e.latlng.lat);
            $('#long').val(e.latlng.lng);
        }

        l1 = '';
        l1 = '<?=$lati;?>';
        if (l1 == '') {
            map.on('locationfound', onLocationFound);
            map.locate({
                setView: true,
                maxZoom: 15
            });
            map.on('click', onMapClick);
        } else {
            var lt = $('#lat').val();
            var lng = $('#long').val();
            marker = new L.Marker([ <?= $lati; ?> , <?= $longi; ?> ], 14, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);
            map.setView([ <?= $lati; ?> , <?= $longi; ?> ], 12);

        }

    });
</script>