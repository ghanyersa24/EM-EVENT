<div class="col m7 s12">
    <h5>Drop Out</h5>
    <div class="divider"></div>
    <div class="card center-align">
        <br>
        <span class="card-title  grey-text text-darken-4 mt-3">Pembatalan Staf Diterima</span>
        <div class="row mt-3">
            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button class="btn cyan waves-effect waves-light mb-3 modal-trigger" data-target="modal1" type="submit" onclick="dropout()" name="action">Submit
            <i class="mdi-content-send right"></i>
        </button>
    </div>
</div>


<div id="modal1" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Pesan Konfirmasi</h5>
        <div class="divider"></div>
        <br>
        <!-- <div class="btn-floating btn-large waves-effect waves-light ">
            <i class="mdi-action-delete" style="font-size: 40px"></i>
        </div> -->
        <img id="foto" alt="foto calon">
        <h5>Apakah kamu yakin ?</h5>
        <h6>Mengeluarkan <span class="red-text" id="nama_drop"></span></h6>
    </div>
    <div class="modal-footer center-align mb-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_dropout()" style="float:none">Setuju</a>
    </div>
</div>

<script>
    function dropout() {
        var nim = $('#nim').val();
        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
        $('#foto').attr('src', foto);
        $('#nama_drop').text('Ghany Abdillah Ersa');
        var fakultas = 'Fakultas ' + 'Ilmu Komputer';
        $('#fakultas').text(fakultas);
        $('#nim_pop').text('165150401111060');
    }

    function klik_dropout() {
        var nim = $('#nim').val();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        // Toast.fire({
        //     type: 'success',
        //     title: 'Berhasil melakukan drop out'
        // })
        Toast.fire({
            type: 'error',
            title: 'Gagal melakukan drop out'
        })
    }
</script>