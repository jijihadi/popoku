<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <!-- <li class="nav-item"><a href="javascript:void(0);" class="nav-link">&copy;
                            Copyright of Aros Software Team with &#10084;
                        </a></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- jqueery -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=site_url()?>assets/admin/scripts/main.js"></script>
<!-- moment -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
<!-- selectize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous">
</script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<!-- texteditor -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- datetime -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- map -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
    $(document).ready(function () {
        // datatable
        $('#table1').DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pageLength" : 10,
        });
        $('#table2').DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pageLength" : 10,
        });
        $('#table3').DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pageLength" : 10,
        });
        // select
        $('#examplelevel').selectize({
            sortField: 'text'
        });
        $('#examplelevel2').selectize({
            sortField: 'text'
        });
        $('#examplelevel3').selectize({
            sortField: 'text'
        });
        // file
        document.getElementById('exampleFile').onchange = function () {
            $('#fotoname').html('Foto dari folder: ' + this.value);
        };
        // editor
        CKEDITOR.replace('exampleArticle');
        // map
    });
    $(function () {
        // datetimepicker
        $("#exampledatepicker").flatpickr({
            "enableTime": true,
        });
        $("#exampledatepicker2").flatpickr({
            "enableTime": true,
            minDate: "today"
        });
        // datepicker
        $("#exampledate").flatpickr();

    });
</script>
</body>

</html>