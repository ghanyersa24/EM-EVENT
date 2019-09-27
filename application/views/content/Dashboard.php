<!--start container-->
<div class="container">


    <div id="agendawrap" class="row">
    </div>

    <!-- --start modal -->
    <div id="modalagenda" class="modal" style="z-index: 1200; top:5vh; min-height: 90vh">
        <form id="agenda">
            <div class="modal-content center-align">
                <h5>Buat Rekrutmen</h5>
                <div class="divider"></div>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="tb_agenda" name="tb_agenda" type="text" class="validate">
                        <label for="tb_agenda" class="">Nama Acara</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lembaga" name="lembaga" type="text" class="validate">
                        <label for="lembaga" class="">Lembaga</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"></textarea>
                        <label for="deskripsi" class="">Deskripsi</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickBuka">
                            <span class="material-icon">Tanggal Buka</span>
                        </a>
                        <input id="buka" name="buka" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickTutup">
                            <span class="material-icon">Tanggal Tutup</span>
                        </a>
                        <input id="tutup" name="tutup" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickUmum">
                            <span class="material-icon">Tanggal Pengumuman</span>
                        </a>
                        <input id="pengumuman" name="pengumuman" type="text" readonly>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer right-align mb-3">
                <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
                <a href="#!" onclick="klik_buat()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            </div>
        </form>
    </div>
    <div id="konfirm" class="modal">
        <div class="modal-content center-align">
            <h5>Yakin menggunakan EM-Event ?</h5>
            <div class="divider"></div>
            <br>
            <p>Dengan ini saya <br><?= 'NAMA : ' . $this->session->userdata('nama') . '<br> FAKULTAS : ' . $this->session->userdata('fak') . '<br> NIM : ' . $this->session->userdata('nim') ?></p>
            <br>

            <p>
                <input type="checkbox" id="sepakat">
                <label for="sepakat">Dengan ini saya menyetujui dan bersedia untuk bertanggung jawab penuh selama rekrutmen ini.</label>
            </p>
        </div>
        <br>
        <div class="modal-footer right-align mb-3">
            <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
            <a href="#!" onclick="setuju()" class="modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
        </div>
    </div>
    <div id="edit_agenda" class="modal" style="z-index: 1200; top:5vh; min-height: 90vh">
        <form id="agenda">
            <div class="modal-content center-align">
                <h5>Buat Rekrutmen</h5>
                <div class="divider"></div>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="tb_agenda" name="tb_agenda" type="text" class="validate">
                        <label for="tb_agenda" class="">Nama Acara</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lembaga" name="lembaga" type="text" class="validate">
                        <label for="lembaga" class="">Lembaga</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"></textarea>
                        <label for="deskripsi" class="">Deskripsi</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickBuka">
                            <span class="material-icon">Tanggal Buka</span>
                        </a>
                        <input id="buka" name="buka" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickTutup">
                            <span class="material-icon">Tanggal Tutup</span>
                        </a>
                        <input id="tutup" name="tutup" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn pickUmum">
                            <span class="material-icon">Tanggal Pengumuman</span>
                        </a>
                        <input id="pengumuman" name="pengumuman" type="text" readonly>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer right-align mb-3">
                <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
                <a href="#!" onclick="klik_buat()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            </div>
        </form>
    </div>
    <!-- --end modal -->
    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large modal-trigger" href="#konfirm">
            <i class="mdi-content-add-circle"></i>
        </a>
    </div>
</div>
<!--end container-->




<script>
    $('.datepicker').on('mousedown', function(event) {
        event.preventDefault();
    })
    var nim = sessionStorage.getItem('nim');
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })
    $(document).ready(function() {
        autoload();
    });

    function autoload() {
        let agenda = "";
        $.ajax({
            url: '<?php echo base_url('agenda/get') ?>',
            type: 'POST',
            data: {
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                r.data.forEach(r => {
                    let id_agenda = window.btoa(r.ID_AGENDA);
                    agenda += '<div class="col l3"><div class="card"><div class="card-image waves-effect waves-block waves-light"><img class="activator" src="' + r.FOTO + '"></div><div class="card-content"><span class="card-title activator grey-text text-darken-4">' + r.TB_AGENDA.substring(0, 17) + '<br> </span> <p><a href="<?= base_url('presensi/index/') ?>' + id_agenda + '">Masuk</a> <a class="modal-trigger" href="#edit_agenda" onclick="edit_agenda()"><i class="material-icons right">more_vert</i></a> </p></div><div class="card-reveal"><span class="card-title grey-text text-darken-4">' + r.TB_AGENDA + '<i class="material-icons right">close</i></span><p>' + r.DESKRIPSI + '</p></div></div></div>';
                });
                tampilan_awal(agenda);
            }
        })
    }

    function tampilan_awal(agenda) {
        $("#agendawrap").html("");
        $("#agendawrap").append(agenda);
    }

    function tutup() {
        $('.modal').fadeOut('slow');
    }

    function edit_agenda() {
        $("#edit_agenda").fadeIn('slow');
    }

    function setuju() {
        if ($('#sepakat').is(":checked")) {
            tutup();
            $('#modalagenda').fadeIn('slow');
        }
    }

    function klik_buat() {
        let tb_agenda = $("#tb_agenda").val();
        let lembaga = $("#lembaga").val();
        let deskripsi = $("#deskripsi").val();
        let buka = $("#buka").val();
        let tutup = $("#tutup").val();
        let pengumuman = $("#pengumuman").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('agenda/set') ?>",
            data: {
                nim: nim,
                tb_agenda: tb_agenda,
                lembaga: lembaga,
                deskripsi: deskripsi,
                tgl_buka: buka,
                tgl_tutup: tutup,
                tgl_pengumuman: pengumuman

            },
            dataType: "json",
            success: function(data) {
                Toast.fire({
                    type: 'success',
                    title: 'Rekrutmen berhasil disimpan'
                })
                autoload();
                $('#modalagenda').fadeOut('slow');
            },
            error: function() {
                Toast.fire({
                    type: 'error',
                    title: 'Rekrutmen gagal disimpan'
                })
            }
        });
        $('#modal2').fadeOut('slow');

    }
</script>
<script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.standalone.js"></script>
<script src="<?= base_url('node_modules/material-datetime-picker/') ?>dist/material-datetime-picker.js" charset="utf-8"></script>

<script>
    var picker = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD/MM/YYYY HH:mm");
            $('#buka').val(d);
        });

    var picker2 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD/MM/YYYY HH:mm");
            $('#tutup').val(d);
        });

    var picker3 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD/MM/YYYY HH:mm");
            $('#pengumuman').val(d);
            console.log(d);
        });

    var el = document.querySelector('.pickBuka');
    el.addEventListener('click', function() {
        picker.open();
    }, false);

    var el2 = document.querySelector('.pickTutup');
    el2.addEventListener('click', function() {
        picker2.open();
    }, false);

    var el3 = document.querySelector('.pickUmum');
    el3.addEventListener('click', function() {
        picker3.open();
    }, false);
</script>