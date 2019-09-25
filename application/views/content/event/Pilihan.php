<div class="col offset-m2 m8 s12">
    <h5>Pilihan</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none" id="listinti">
    </ul>

    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
    <a class="btn-floating btn-large modal-trigger" href="#modalpilihan">
        <i class="mdi-content-add-circle"></i>
    </a>
    </div>

    <div id="modalpilihan" class="modal" style="z-index: 4">
    <form id="agenda">
        <div class="modal-content center-align">
            <h5>Tambahkan pilihan</h5>
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
</div>

