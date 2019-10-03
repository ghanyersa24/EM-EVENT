<div class="col offset-m2 m8 s12">
    <h5>PANITIA INTI</h5>
    <div class="divider"></div>
    <ul class="collection" style="border: none" id="pilihan_inti">
    </ul>
    <br>
    <h5>DIVISI PILIHAN</h5>
    <div class="divider"></div>
    <ul class="collection" style="border: none" id="pilihan_divisi">
    </ul>

    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large modal-trigger" href="#add_divisi">
            <i class="mdi-content-add-circle"></i>
        </a>
    </div>
    <div id="add_divisi" class="modal" style="z-index: 4; overflow-x:hidden">
        <div class="row">
            <div class="modal-content center-align">
                <h5>Tambah Pilihan</h5>
                <div class="divider"></div>
                <br>
                <div class="input-field col s8 offset-s2">
                    <input id="nama_divisi" name="nama_divisi" type="text" class=" validate" placeholder="Nama Divisi">
                    <select id="hak">
                        <option value="BPI">Pengurus Inti</option>
                        <option value="BPH">Pengurus Harian</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="modal-footer center-align mb-3">
            <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
            <a href="#!" onclick="tambah_divisi()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
        </div>
    </div>

    <div id="edit_divisi" class="modal" style="z-index: 4; overflow-x:hidden; top:15vh">
        <div class="row">
            <div class="modal-content center-align">
                <h5>Edit Pilihan</h5>
                <div class="divider"></div>
                <br>
                <div class="input-field col s8 offset-s2">
                    <input id="edit_nama_divisi" name="edit_nama_divisi" type="text" class=" validate" placeholder="Nama Divisi">
                    <select id="edit_hak">
                        <option value="BPI">Pengurus Inti</option>
                        <option value="BPH">Pengurus Harian</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="modal-footer center-align mb-3">
            <a href="#" class="waves-effect waves-red btn-flat" onclick="edit_close()" style="float:none">Tidak</a>
            <a href="#!" onclick="save_divisi()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
        </div>
    </div>
</div>
<script>
    var id_divisi = 0;
    $(document).ready(function() {
        load_pilihan();
    });

    function load_pilihan() {
        let harian = "";
        let inti = "";
        $.ajax({
            url: '<?php echo base_url('pilihan/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda
            },
            dataType: 'json',
            success: (r) => {
                if (r.error == false) {
                    r.data.forEach(element => {
                        if (element.HAK == 'BPI') {
                            inti += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.TB_PILIHAN + '<p> Pengurus Inti</p>' + element.ACTION + '</li>';
                        } else {
                            harian += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.TB_PILIHAN + '<p> Divisi</p>' + element.ACTION + '</li>';
                        }
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Calon tidak terdaftar'
                    })
                    $("#modal1").fadeOut();
                }
                $("#pilihan_inti").html("");
                $("#pilihan_divisi").html("");
                $("#pilihan_inti").append(inti);
                $("#pilihan_divisi").append(harian);
            }
        })
    }

    function tambah_divisi() {
        $.ajax({
            url: '<?php echo base_url('pilihan/set') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                pilihan: $("#nama_divisi").val(),
                hak: $("#hak").children("option:selected").val()
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: 'Divisi berhasil ditambahkan'
                    });
                    load_pilihan()
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Divisi gagal ditambahkan'
                    });
                }
            }
        })

    }

    function edit_divisi(id, divisi, hak) {
        id_divisi = id;
        $("#edit_nama_divisi").val(divisi);
        $("#edit_divisi").fadeIn('slow');

    }

    function edit_close() {
        $("#edit_divisi").fadeOut('slow');
    }

    function save_divisi() {
        var hak = $("#edit_hak").children("option:selected").val();
        console.log(hak);
        $.ajax({
            url: '<?php echo base_url('pilihan/update') ?>',
            type: 'POST',
            data: {
                id_pilihan: id_divisi,
                pilihan: $("#edit_nama_divisi").val(),
                hak: hak
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: 'Divisi berhasil ditambahkan'
                    });
                    load_pilihan()
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Divisi gagal ditambahkan'
                    });
                }
                edit_close();
            }
        })
    }
</script>