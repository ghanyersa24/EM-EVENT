<div class="col m7 s12">
    <h5>Presensi</h5>
    <div class="divider"></div>
    <div class="card center-align">
        <br>
        <span class="card-title  grey-text text-darken-4 mt-3">Screening / Validation</span>
        <div class="row mt-3">
            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button class="btn cyan waves-effect waves-light mb-3 modal-trigger" type="submit" name="action" data-target="modal1" onclick="presensi()">Submit
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
        <h5 id="nama"></h5>
        <h6 id="fakultas"></h6>
        <h6 id="nim_pop"></h6>
    </div>
    <div class="modal-footer center-align">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_presensi()" style="float:none">Setuju</a>
    </div>
</div>

<script>
    function presensi() {
        var nim = $('#nim').val();
        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
        $('#foto').attr('src', foto);
        $('#nama').text('Ghany Abdillah Ersa');
        var fakultas = 'Fakultas ' + 'Ilmu Komputer';
        $('#fakultas').text(fakultas);
        $('#nim_pop').text('165150401111060');
    }

    function klik_presensi() {
        var nim = $('#nim').val();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        // Toast.fire({
        //     type: 'success',
        //     title: 'Presensi Interview Berhasil Dilakukan'
        // })
        Toast.fire({
            type: 'error',
            title: 'Presensi Interview Gagal Dilakukan'
        })
    }
</script>