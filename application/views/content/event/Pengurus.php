<div class="col offset-m2 m8 s12">
    <h5>Pengurus Inti</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none" id="listinti">
    </ul>
    <br><br>
    <h5>Pengurus Harian</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none" id="listharian">
    </ul>
</div>

<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
    <a class="btn-floating btn-large modal-trigger" href="#add_nim">
        <i class="mdi-content-add-circle"></i>
    </a>
</div>

<!-- tambah pengurus -->
<div id="add_nim" class="modal" style="z-index: 4">
    <div class="modal-content center-align">
        <h5>Tambahkan Pengurus</h5>
        <div class="divider"></div>
        <br>
        <div class="center-align">
            <form action="" id="presensiform">
                <div class="row mt-3">
                    <div class="input-field col s8 m6 offset-s2 offset-m3">
                        <input id="add_nim_pengurus" type="number" class="validate">
                        <label for="add_nim_pengurus" class="center-align">NIM</label>
                    </div>
                </div>
                <button type="submit" class="btn cyan waves-effect waves-light mb-3" onclick="search()">Submit
                    <i class="mdi-content-send right"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<div id="add_pengurus" class="modal" style="min-height: 89% !important; margin-top:-7vh; z-index:9999">
    <form id="formPengurus" action="">
        <div class="modal-content center-align">
            <h5>Tambah Pengurus</h5>
            <div class="divider"></div>
            <br>
            <img id="foto_pengurus" alt="foto pengurus">
            <br>
            <div class="input-field col s8 offset-s2">
                <input id="nimPengurus" name="nimPengurus" type="text" class=" validate" placeholder="NIM">
                <input id="nama_pengurus" name="nama_pengurus" type="text" class=" validate" placeholder="Nama Pengurus">
                <select id="pilihanPengurus" class="materialSelect">
                    <option value="" disabled selected>Pilih Divisi</option>
                </select>
                <input id="telepon" name="telepon" type="text" class=" validate" placeholder="Telepon">
                <input id="linePengurus" name="linePengurus" type="text" class=" validate" placeholder="Line">
            </div>
        </div>
        <div style="margin-top:50vh"></div>
        <div class="modal-footer center-align mt-3 mb-3">
            <a href="#" class="waves-effect waves-red btn-flat modal-close" onclick="tutup()" style="float:none">Tidak</a>
            <a href="#!" type="submit" onclick="tambah_pengurus()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            <div class="mt-3"></div>
        </div>
    </form>
</div>
<!-- detail pengurus -->
<div id="modal2" class="modal" style="min-height: 80% !important">
    <form id="formPengurus" action="">
        <div class="modal-content center-align">
            <h5>Data Pengurus</h5>
            <div class="divider"></div>
            <br>
            <a href="#!" onclick="hapus()" class="secondary-content tooltipped" data-position="right" data-tooltip="Keluarkan Pengurus"><i class="mdi-content-clear" style="font-size: 25px"></i></a>
            <img id="foto_pengurus" alt="foto pengurus">
            <br>
            <div class="input-field col s8 offset-s2">
                <input id="nimPengurus" name="nimPengurus" type="text" class=" validate" placeholder="NIM">
                <input id="nama_pengurus" name="nama_pengurus" type="text" class=" validate" placeholder="Nama Pengurus">
                <select id="pilihanPengurus" class="materialSelect">
                    <option value="" disabled selected>Pilih Divisi</option>
                </select>
                <input id="telepon" name="telepon" type="text" class=" validate" placeholder="Telepon">
                <input id="linePengurus" name="linePengurus" type="text" class=" validate" placeholder="Line">
            </div>
        </div>
        <div style="margin-top:50vh"></div>
        <div class="modal-footer center-align mt-3 mb-3">
            <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
            <a href="#!" type="submit" onclick="klik_ubah()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            <div class="mt-3"></div>
        </div>
    </form>
</div>
<!-- hapus pengurus -->
<div id="modal3" class="modal">
    <div class="modal-content center-align">
        <h5>Pesan Konfirmasi</h5>
        <div class="divider"></div>
        <br>
        <div class="btn-floating btn-large waves-effect waves-light ">
            <i class="mdi-action-delete" style="font-size: 40px"></i>
        </div>
        <h5>Apakah kamu yakin ?</h5>
        <h6>Mengeluarkan <span class="red-text" id="pengurus_drop"></span></h6>

    </div>
    <br>
    <div class="modal-footer center-align mb-3">
        <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" onclick="klik_hapus()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
    </div>

</div>

<script>
    var nimlama = 0;
    var pilihanlama = "";
    var nama = "";

    $(document).ready(function() {
        var pilihan = [{
            "ID_PILIHAN": 68,
            "TB_PILIHAN": "SDK"
        }, {
            "ID_PILIHAN": 67,
            "TB_PILIHAN": "PUSKOMINFO"
        }, {
            "ID_PILIHAN": 70,
            "TB_PILIHAN": "ADKEU"
        }];

        $.each(pilihan, function(i, item) {
            var $newOpt = $("<option>").attr("value", item.ID_PILIHAN).text(item.TB_PILIHAN)
            $("#pilihanPengurus").append($newOpt);
            $("#pilihanPengurus").trigger('contentChanged');
        });
        autoload();
    });

    function autoload() {
        let harian = "";
        let inti = "";
        $.ajax({
            url: '<?php echo base_url('pengurus/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
            },
            dataType: 'json',
            success: (r) => {
                if (r.error == false) {
                    r.data.forEach(element => {
                        nama = "'" + element.NAMA + "'";
                        if (element.STATUS == 'BPI') {
                            inti += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.NAMA + '<p>' + element.JABATAN + '</p>' + element.ACTION + '</li>';
                        } else {
                            harian += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.NAMA + '<p>' + element.JABATAN + '</p>' + element.ACTION + '</li>';
                        }
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Calon tidak terdaftar'
                    })
                    $("#modal1").fadeOut();
                }
                tampilan_awal(inti, harian);
            }
        })
    }

    function tampilan_awal(inti, harian) {
        $("#listharian").html("");
        $("#listinti").html("");
        $("#listinti").append(inti);
        $("#listharian").append(harian);
    }

    function search() {
        var nim = $("#add_nim_pengurus").val();
        $('#add_nim').fadeOut('slow');
        Toast.fire({
            type: 'error',
            title: 'NIM belum pernah melakukan login di EM APPS'
        })
        $('#add_pengurus').fadeIn('slow');
    }

    function tambah_pengurus() {
        // Toast.fire({
        //     type: 'success',
        //     title: 'Pengurus berhasil ditambahkan'
        // })
        Toast.fire({
            type: 'error',
            title: 'Pengurus gagal ditambahkan'
        })
        tutup();
    }

    function ubah(nim, pilihan, nama, telepon, line) {
        $('#foto_pengurus').attr('src', "");
        $('#nama_pengurus').text("");
        $('#nimPengurus').text("");
        $("input[name=telepon]").val("");
        $("input[name=linePengurus]").val("");
        window.nimlama = nim;
        window.pilihanlama = pilihan;
        window.nama = nama;

        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
        $('#foto_pengurus').attr('src', foto);
        $("input[name=nimPengurus]").val(nim);
        $("input[name=nama_pengurus]").val(nama);
        $("input[name=telepon]").val(telepon);
        $("input[name=linePengurus]").val(line);
        $('#modal2').fadeIn('slow');
    }

    function hapus() {
        $('#pengurus_drop').text(nama);
        $('#modal2').fadeOut('slow');
        $('#modal3').fadeIn('slow');
    }

    function tutup() {
        $('.modal').fadeOut('slow');
    }

    function klik_hapus() {
        $.ajax({
            url: "<?= base_url('pengurus/delete') ?>",
            type: 'POST',
            data: {
                nim: nimlama,
                id_pilihan: pilihanlama
            },
            dataType: "json",
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: 'Pengurus berhasil dihapus'
                    })
                    autoload();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Pengurus gagal dihapus'
                    })
                }
                $('.modal').fadeOut('slow');
            }
        });

    }

    function klik_ubah() {
        $.ajax({
            url: '<?php echo base_url('pengurus/update') ?>',
            type: 'POST',
            data: {
                idlama: pilihanlama,
                nimlama: nimlama,
                nim: $("#nimPengurus").val(),
                nama: $("#nama_pengurus").val(),
                id_pilihan: $("#pilihanPengurus").children("option:selected").val(),
                line: $("#linePengurus").val(),
                telpon: $("#telepon").val()
            },
            dataType: 'json',
            success: (r) => {
                if (r.error == false) {
                    Toast.fire({
                        type: 'success',
                        title: 'Perubahan berhasil dilakukan'
                    })
                    autoload();
                    $('#modal2').fadeOut('slow');
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Perubahan gagal dilakukan'
                    })
                    $("#modal2").fadeOut();
                }


            }
        })
    }
</script>