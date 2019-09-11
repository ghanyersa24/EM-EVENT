<div class="col m7 s12">
    <h5>Plotting</h5>
    <div class="divider"></div>
    <div class="card center-align">
        <br>
        <span class="card-title  grey-text text-darken-4 mt-3">Pemilihan Staf Diterima</span>
        <div class="row mt-3">
            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button class="btn cyan waves-effect waves-light mb-3 modal-trigger" data-target="modal1" type="submit" name="action" onclick="plotting()">Submit
            <i class="mdi-content-send right"></i>
        </button>
    </div>
</div>
<div id="modal1" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Staf Muda EM UB 2019</h5>
        <div class="divider"></div>
        <br>
        <img id="foto" alt="foto calon">
        <h6 id="nama"></h6>
        <div class="input-field col s8 offset-s2">
            <select id="myDropdown" class="materialSelect">
                <option value="" disabled selected>Pilih Divisi</option>
            </select>
            <label>Divisi</label>
        </div>
    </div>
    <br>
    <div class="modal-footer center-align mt-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_plotting()" style="float:none">Setuju</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        var pilihan = [{
            "ID_PILIHAN": 20,
            "TB_PILIHAN": "DIVISI ACARA"
        }, {
            "ID_PILIHAN": 21,
            "TB_PILIHAN": "DIVISI PIT"
        }, {
            "ID_PILIHAN": 22,
            "TB_PILIHAN": "DIVISI DDM"
        }, {
            "ID_PILIHAN": 23,
            "TB_PILIHAN": "DIVISI HUMAS"
        }, {
            "ID_PILIHAN": 24,
            "TB_PILIHAN": "DIVISI KONSUMSI"
        }, {
            "ID_PILIHAN": 25,
            "TB_PILIHAN": "DIVISI PERLENGKAPAN"
        }, {
            "ID_PILIHAN": 26,
            "TB_PILIHAN": "DIVISI KESTARI"
        }, {
            "ID_PILIHAN": 27,
            "TB_PILIHAN": "DIVISI KESEHATAN"
        }, {
            "ID_PILIHAN": 28,
            "TB_PILIHAN": "DIVISI KORLAP"
        }, {
            "ID_PILIHAN": 29,
            "TB_PILIHAN": "DIVISI SPV"
        }];

        $.each(pilihan, function(i, item) {
            var $newOpt = $("<option>").attr("value", item.ID_PILIHAN).text(item.TB_PILIHAN)
            $("#myDropdown").append($newOpt);
            $("#myDropdown").trigger('contentChanged');
        });
    });

    function plotting() {
        var nim = $('#nim').val();
        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
        $('#foto').attr('src', foto);
        $('#nama').text('Ghany Abdillah Ersa');
    }


    function klik_plotting() {
        var nim = $('#nim').val();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        Toast.fire({
            type: 'success',
            title: 'Plottingan Berhasil Dilakukan'
        })
        // Toast.fire({
        //     type: 'error',
        //     title: 'Plottingan Gagal Dilakukan'
        // })
    }
</script>