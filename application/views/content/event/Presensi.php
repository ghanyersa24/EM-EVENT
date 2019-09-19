<br>
<div class="card center-align">
    <br>
    <span class="card-title  grey-text text-darken-4 mt-3">Screening / Validation</span>
    <form action="" id="presensiform">
        <div class="row mt-3">

            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button type="submit" class="btn cyan waves-effect waves-light mb-3 modal-trigger" type="submit" name="action" data-target="modal1" onclick="presensi()">Submit
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>

<div id="modal1" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Konfirmasi EM-Event</h5>
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
    var id_agenda = '<?= $idagenda; ?>';
    id_agenda = window.atob(id_agenda);
    var nim = $('#nim').val();
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })
    $("#presensiform").on("submit", function() {
        event.preventDefault();
        presensi();
    })

    function presensi() {
        var nim = $('#nim').val();
        $.ajax({

            url: '<?php echo base_url('presensi/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                console.log(r);
                if (r.error == false) {
                    if (r.data.STATUS == 'DAFTAR') {
                        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
                        $('#foto').attr('src', foto);
                        $('#nama').html("");
                        $('#fakultas').html("");
                        $('#nim_pop').html("");
                        $('#nama').text(r.data.NAMA_LENGKAP);
                        var fakultas = r.data.FAKULTAS;
                        $('#fakultas').text(fakultas);
                        $('#nim_pop').text(nim);
                    } else if (r.data.STATUS == 'DITERIMA') {
                        Toast.fire({
                            type: 'error',
                            title: 'Calon sudah diterima di ' + r.data.TB_PILIHAN
                        })
                        $("#modal1").fadeOut();
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'Calon sudah melakukan interview'
                        })
                        $("#modal1").fadeOut();
                    }

                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Calon tidak terdaftar'
                    })
                    $("#modal1").fadeOut();
                }
            },
            error: function(jqXHR, exception) {
                Toast.fire({
                    type: 'error',
                    title: 'Pokok error'
                })
            }
        })

    }

    function klik_presensi() {
        var nim = $('#nim').val();
        $.ajax({
            url: '<?php echo base_url('presensi/update') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                console.log(r);
                if (r.message == "Berhasil melakukan presensi") {
                    Toast.fire({
                        type: 'success',
                        title: 'Presensi Interview Berhasil Dilakukan'
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Presensi Interview Gagal Dilakukan'
                    })
                }
            }
        })
    }
</script>