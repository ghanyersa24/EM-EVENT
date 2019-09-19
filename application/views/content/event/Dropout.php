<br>
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


<div id="modal1" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Konfirmasi EM-Event</h5>
        <div class="divider"></div>
        <br>
        <!-- <div class="btn-floating btn-large waves-effect waves-light ">
            <i class="mdi-action-delete" style="font-size: 40px"></i>
        </div> -->
        <img id="foto" alt="foto calon">
        <h5>Apakah kamu yakin ?</h5>
        <h6>Mengeluarkan <span class="red-text" id="nama_drop"></span></h6>
        <h6>dari <span class="cyan-text" id="agenda"></span></h6>
    </div>
    <div class="modal-footer center-align mb-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_dropout()" style="float:none">Setuju</a>
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

    function dropout() {
        var nim = $('#nim').val();
        $.ajax({

            url: '<?php echo base_url('plotting/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                console.log(r);
                if (r.error == false) {
                    if (r.data.STATUS == 'DITERIMA') {
                        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
                        $('#foto').attr('src', foto);
                        $('#nama_drop').html("");
                        $('#agenda').html("");
                        $('#nama_drop').text(r.data.NAMA_LENGKAP);
                        $('#agenda').text(r.data.TB_PILIHAN);
                    } else if (r.data.STATUS == 'SCREENING') {
                        Toast.fire({
                            type: 'error',
                            title: 'Calon memang belum diterima '
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

    function klik_dropout() {
        var nim = $('#nim').val();
        $.ajax({
            url: '<?php echo base_url('plotting/updateDrop') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                console.log(r);
                if (r.error==false) {
                    Toast.fire({
                        type: 'success',
                        title: 'Calon berhasil di drop out'
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Calon gagal di drop out'
                    })
                }
            }
        })
    }
</script>