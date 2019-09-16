<!--start container-->
<div class="container row">
    <!-- <?php
    foreach ($data as $cetak) {
        ?>
        <div class="col m3">
            <a href="<?= base_url('statistik/index/' . base64_encode($cetak['ID_AGENDA'])) ?>">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light"><img class="activator" style="height: 200px" src="<?= $cetak['FOTO'] ?>" alt="foto Agenda"></div>
                    <div class="card-content"><span class="card-title activator grey-text text-darken-4"><?= character_limiter($cetak['TB_AGENDA'], 10) ?></span>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?> -->

    <!-- --start modal -->
    <div id="modal2" class="modal" style="z-index: 4">
        <form id="agenda">
            <div class="modal-content center-align">
                <h5>Buat Agenda Rekrutmen</h5>
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
            </div>
            <br>
            <div class="modal-footer right-align mb-3">
                <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
                <a href="#!" onclick="klik_buat()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
            </div>
        </form>
    </div>

    <div id="modal3" class="modal" style="z-index: 4">
        <div class="modal-content center-align">
            <h5>Yakin menggunakan EM-Event ?</h5>
            <div class="divider"></div>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius tempora enim et provident eum neque excepturi itaque ducimus facere molestiae aut, incidunt saepe mollitia voluptatibus soluta illo officia perspiciatis voluptatem.</p>
            <br>

            <p>
                <input type="checkbox" id="test5">
                <label for="test5">Dengan ini saya menyetujui dan bersedia untuk bertanggung jawab penuh selama rekrutmen ini.</label>
            </p>
        </div>
        <br>
        <div class="modal-footer right-align mb-3">
            <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
            <a href="#!" onclick="setuju()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
        </div>
    </div>
    <!-- --end modal -->

    <!-- Floating Action Button -->
    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large" onclick="setuju()">
            <i class="mdi-content-add-circle"></i>
        </a>
    </div>
    <!-- Floating Action Button -->
</div>
<!--end container-->




<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })

    function mou() {
        var nama = $('#nama_pengurus').text();
        $('#pengurus_drop').text(nama);
        $('#modal2').fadeOut('slow');
        $('#modal3').fadeIn('slow');
    }

    function tutup() {
        $('.modal').fadeOut('slow');
    }

    function setuju() {
        $('.modal').fadeOut('slow');
        $('#modal2').fadeIn('slow');
    }

    function klik_buat() {
        var agenda = $("#agenda").serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('agenda/setAgenda') ?>",
            data: agenda,
            dataType: "json",
            success: function(data) {
                Toast.fire({
                    type: 'success',
                    title: 'Rekrutmen berhasil disimpan'
                })
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