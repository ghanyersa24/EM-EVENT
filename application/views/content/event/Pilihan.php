<div class="col offset-m2 m8 s12">
    <h5>Pilihan</h5>
    <div class="divider"></div>
    <br>
    <ul class="collection" style="border: none" id="pilihan">
    </ul>

    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
        <a class="btn-floating btn-large modal-trigger" href="#add_divisi">
            <i class="mdi-content-add-circle"></i>
        </a>
    </div>
    <div class="fixed-action-btn" style="bottom: 50vh; right: 19px;">
        <a class="btn-floating btn-large modal-trigger" href="#edit_divisi">
            <i class="mdi-editor-mode-edit"></i>
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

    <div id="edit_divisi" class="modal" style="z-index: 4; overflow-x:hidden">
        <div class="row">
            <div class="modal-content center-align">
                <h5>Edit Pilihan</h5>
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
            <a href="#!" onclick="save_divisi()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
        </div>
    </div>
</div>
<script>
    function tambah_divisi() {
        Toast.fire({
            type: 'error',
            title: 'Divisi gagal ditambahkan'
        })
    }

    function save_divisi() {
        Toast.fire({
            type: 'error',
            title: 'Divisi gagal diupdate'
        })
    }
</script>