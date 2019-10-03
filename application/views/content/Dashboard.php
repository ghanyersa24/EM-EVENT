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
                <h5>Edit Rekrutmen</h5>
                <div class="divider"></div>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="edit_tb_agenda" name="edit_tb_agenda" type="text" class="validate">
                        <label for="tb_agenda" class="">Nama Acara</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="edit_lembaga" name="lembaga" type="text" class="validate">
                        <label for="lembaga" class="">Lembaga</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="edit_deskripsi" name="deskripsi" class="materialize-textarea"></textarea>
                        <label for="deskripsi" class="">Deskripsi</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn edit_pickBuka">
                            <span class="material-icon">Tanggal Buka</span>
                        </a>
                        <input id="edit_buka" name="buka" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn edit_pickTutup">
                            <span class="material-icon">Tanggal Tutup</span>
                        </a>
                        <input id="edit_tutup" name="tutup" type="text" readonly>
                    </div>
                    <div class="input-field col s4">
                        <a class="c-btn c-datepicker-btn edit_pickUmum">
                            <span class="material-icon">Tanggal Pengumuman</span>
                        </a>
                        <input id="edit_pengumuman" name="pengumuman" type="text" readonly>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer right-align mb-3">
                <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
                <a href="#!" onclick="klik_save()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            </div>
        </form>
    </div>

    <div id="hapus_agenda" class="modal" style="z-index: 1200; top:5vh; min-height: 90vh">
        <div class="modal-content center-align">
            <h5>Konfirmasi EM-Event</h5>
            <div class="divider"></div>
            <br>
            <img id="foto" alt="foto agenda" style="width: 50%">
            <h5>Apakah kamu yakin ?</h5>
            <h6>akan menghapus agenda rekrutmen <span class="red-text" id="text-agenda"></span></h6>
        </div>
        <div class="modal-footer center-align mb-3">
            <a href="#" class="waves-effect waves-red btn-flat" onclick="tutup()" style="float:none">Tidak</a>
            <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_hapus()" style="float:none">Setuju</a>
        </div>
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
    var temp_agenda = 0;
    var temp_nim = "";
    var temp_foto = "";
    var nim = <?= $this->session->userdata('nim') ?>;

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
            url: '<?php echo base_url('agenda/all') ?>',
            type: 'POST',
            data: {
                nim: nim
            },
            dataType: 'json',
            success: (r) => {
                tampilan_awal(r.data);
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

    function edit_agenda(agenda) {
        $.ajax({
            url: '<?php echo base_url('agenda/get') ?>',
            type: 'POST',
            data: {
                id_agenda: agenda
            },
            dataType: 'json',
            success: (r) => {
                r = r.data;
                temp_agenda = r.ID_AGENDA;
                temp_nim = r.NIM;
                temp_foto = r.FOTO;
                // console.log(temp_nim);
                $("#edit_tb_agenda").val(r.TB_AGENDA);
                $("#edit_lembaga").val(r.LEMBAGA);
                $("#edit_deskripsi").val(r.DESKRIPSI);
                $("#edit_buka").val(r.TGL_BUKA);
                $("#edit_tutup").val(r.TGL_TUTUP);
                $("#edit_pengumuman").val(r.TGL_PENGUMUMAN);
            }
        })
        $("#edit_agenda").fadeIn('slow');
    }

    function hapus_agenda(id, nim, agenda, foto) {
        temp_nim = nim;
        temp_agenda = window.atob(id);
        $("#foto").attr('src', foto);
        $("#text-agenda").html(agenda);
        $("#hapus_agenda").fadeIn('show');
    }

    function setuju() {
        if ($('#sepakat').is(":checked")) {
            $("#tb_agenda").val("");
            $("#lembaga").val("");
            $("#deskripsi").val("");
            $("#buka").val("");
            $("#tutup").val("");
            $("#pengumuman").val("");
            tutup();
            $('#sepakat').prop('checked',false);
            $('#modalagenda').fadeIn('slow');
        }
    }

    function klik_hapus() {
        if (nim == temp_nim) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('agenda/delete') ?>",
                data: {
                    id_agenda: temp_agenda,
                    nim: nim
                },
                dataType: "json",
                success: function(data) {
                    Toast.fire({
                        type: 'success',
                        title: 'Rekrutmen berhasil dihapus'
                    })
                    autoload();
                    $('#hapus_agenda').fadeOut('slow');
                },
                error: function() {
                    Toast.fire({
                        type: 'error',
                        title: 'Rekrutmen gagal dihapus'
                    })
                }
            });
        } else {
            $('#hapus_agenda').fadeOut('slow');
            Toast.fire({
                type: 'error',
                title: 'Kamu bukan pemilik rekrutmen'
            })

        }

    }

    function klik_save() {
        if (nim == temp_nim) {
            let tb_agenda = $("#edit_tb_agenda").val();
            let lembaga = $("#edit_lembaga").val();
            let deskripsi = $("#edit_deskripsi").val();
            let buka = $("#edit_buka").val();
            let tutup = $("#edit_tutup").val();
            let pengumuman = $("#edit_pengumuman").val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('agenda/update') ?>",
                data: {
                    id_agenda: temp_agenda,
                    tb_agenda: tb_agenda,
                    lembaga: lembaga,
                    foto: temp_foto,
                    deskripsi: deskripsi,
                    tgl_buka: buka,
                    tgl_tutup: tutup,
                    tgl_pengumuman: pengumuman

                },
                dataType: "json",
                success: function(data) {
                    Toast.fire({
                        type: 'success',
                        title: 'Rekrutmen berhasil diupdate'
                    })
                    autoload();
                    $('#edit_agenda').fadeOut('slow');
                },
                error: function() {
                    Toast.fire({
                        type: 'error',
                        title: 'Rekrutmen gagal diupdate'
                    })
                }
            });
        } else {
            $('#edit_agenda').fadeOut('slow');
            Toast.fire({
                type: 'error',
                title: 'Kamu bukan pemilik rekrutmen'
            })

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
            d = d.format("DD-MM-YYYY HH:mm");
            $('#buka').val(d);
        });

    var picker2 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD-MM-YYYY HH:mm");
            $('#tutup').val(d);
        });

    var picker3 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD-MM-YYYY HH:mm");
            $('#pengumuman').val(d);
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

    // ------------ edit ---------------
    var edit_picker = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD-MM-YYYY HH:mm");
            $('#edit_buka').val(d);
        });

    var edit_picker2 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD-MM-YYYY HH:mm");
            $('#edit_tutup').val(d);
        });

    var edit_picker3 = new MaterialDatetimePicker({}).on('submit',
        function(d) {
            d = d.format("DD-MM-YYYY HH:mm");
            $('#edit_pengumuman').val(d);
        });

    var edit_el = document.querySelector('.edit_pickBuka');
    edit_el.addEventListener('click', function() {
        edit_picker.open();
    }, false);

    var edit_el2 = document.querySelector('.edit_pickTutup');
    edit_el2.addEventListener('click', function() {
        edit_picker2.open();
    }, false);

    var edit_el3 = document.querySelector('.edit_pickUmum');
    edit_el3.addEventListener('click', function() {
        edit_picker3.open();
    }, false);
</script>