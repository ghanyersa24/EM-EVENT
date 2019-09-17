<div class="col m8 s12">
    <h5>PUSKOMINFO</h5>
    <div class="divider"></div>
    <br>
    <table id="table" class="responsive-table display" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="35%">Nama</th>
                <th width="20%">Fakultas</th>
                <th width="15%">Instagram</th>
                <th width="15%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Fakultas</th>
                <th>Instagram</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<div id="modal1" class="modal" style="min-height: 80% !important;min-width:80%; z-index: 3">
    <div class="modal-content center-align">
        <h5>Staf Muda EM UB 2019</h5>
        <div class="divider"></div>
        <br>
        <img id="foto" alt="foto calon">
        <h6 id="nama"></h6>
    </div>
    <br>
    <div class="modal-footer center-align mt-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" id="tutup">Tutup</a>
    </div>
</div>


<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>custom-script.js"></script>
<script>
var id_agenda = '<?= $idagenda;?>';
id_agenda = window.atob(id_agenda);
    function buka(nim) {
        $('#nama').text(nim);
        $('#modal1').fadeIn('slow');
    }
    $('#tutup').click(function() {
        $('#modal1').fadeOut('slow');
    });
</script>