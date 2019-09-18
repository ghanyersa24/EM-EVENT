<div class="col offset-m2 m8 s12">
    <h5>Pengurus Inti</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none">
        <li class="collection-item avatar">
            <img src="https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=165150401111060&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw" alt="" class="circle">
            <span class="title">Ghany Abdillah Ersa</span>
            <p>Ketua Panitia </p>
            <a href="#!" onclick="ubah('165150401111060','111')" class="secondary-content tooltipped" data-position="right" data-tooltip="Ubah Pengurus"><i class="mdi-content-create"></i></a>

        </li>
        <li class="collection-item avatar">
            <i class="mdi-action-account-circle circle"></i>
            <span class="title">Nama</span>
            <p>Jabatan</p>
            <a href="#!" onclick="ubah('165150401111060','111')" class="secondary-content tooltipped" data-position="right" data-tooltip="Ubah Pengurus"><i class="mdi-content-create"></i></a>

        </li>
    </ul>
    <br><br>
    <h5>Pengurus Harian</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none">
        <li class="collection-item avatar">
            <i class="mdi-action-account-circle circle green"></i>
            <span class="title">Nama</span>
            <p>Jabatan</p>
            <a href="#!" onclick="ubah('165150401111060','111')" class="secondary-content tooltipped" data-position="right" data-tooltip="Ubah Pengurus"><i class="mdi-content-create"></i></a>


        </li>
        <li class="collection-item avatar">
            <i class="mdi-action-account-circle circle red"></i>
            <span class="title">Nama</span>
            <p>Jabatan</p>
            <a href="#!" onclick="ubah('165150401111060','111')" class="secondary-content tooltipped" data-position="right" data-tooltip="Ubah Pengurus"><i class="mdi-content-create"></i></a>
        </li>
    </ul>
</div>

<div id="modal2" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Pengurus Staf Muda EM UB 2019</h5>
        <div class="divider"></div>
        <br>
        <a href="#!" onclick="hapus()" class="secondary-content tooltipped" data-position="right" data-tooltip="Keluarkan Pengurus"><i class="mdi-content-clear" style="font-size: 25px"></i></a>
        <img id="foto_pengurus" alt="foto pengurus">
        <h6 id="nama_pengurus"></h6>
        <div class="input-field col s8 offset-s2">
            <select id="myDropdown" class="materialSelect">
                <option value="" disabled selected>Pilih Divisi</option>
            </select>
            <label>Divisi</label>
        </div>
    </div>
    <br>
    <div class="modal-footer center-align mt-3">
        <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" onclick="klik_pengurus()" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_plotting()" style="float:none">Setuju</a>
    </div>
</div>
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
        <a href="#!" onclick="klik_hapus()" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_plotting()" style="float:none">Setuju</a>
    </div>
    
</div>
<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large modal-trigger" href="#modalpengurus">
            <i class="mdi-content-add-circle"></i>
        </a>
    </div>
    <div id="modalpengurus" class="modal" style="z-index: 4">
        <form id="agenda">
            <div class="modal-content center-align">
                <h5>Tambahkan pengurus</h5>
                <div class="divider"></div>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nim_pengurus" name="nim_pengurus" type="text" class="validate">
                        <label for="nim_pengurus" class="">NIM</label>
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
            </div>
            <br>
            <div class="modal-footer right-align mb-3">
                <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
                <a href="#!" onclick="klik_buat()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            </div>
        </form>
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

    function ubah(nim, agenda) {
        var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
        $('#foto_pengurus').attr('src', foto);
        $('#nama_pengurus').text('GHANY ABDILLAH ERSA');
        $('#modal2').fadeIn('slow');
    }

    function hapus() {
        var nama= $('#nama_pengurus').text();
        $('#pengurus_drop').text(nama);
        $('#modal2').fadeOut('slow');
        $('#modal3').fadeIn('slow');
    }

    function tutup() {
        $('.modal').fadeOut('slow');
    }

    function klik_hapus() {
        $('.modal').fadeOut('slow');
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        // Toast.fire({
        //     type: 'success',
        //     title: 'Pengurus berhasil dihapus'
        // })
        Toast.fire({
            type: 'error',
            title: 'Pengurus gagal dihapus'
        })
    }
    function klik_pengurus() {
        $('#modal2').fadeOut('slow');
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        Toast.fire({
            type: 'success',
            title: 'Perubahan Berhasil Dilakukan'
        })
        // Toast.fire({
        //     type: 'error',
        //     title: 'Perubahan Gagal Dilakukan'
        // })
    }
</script>