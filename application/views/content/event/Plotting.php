<div class="col m7 s12">
    <h5>Plotting</h5>
    <div class="divider"></div>
    <div class="card center-align">
        <br>
        <span class="card-title  grey-text text-darken-4 mt-3">Pemilihan Staf Diterima</span>
        <div class="row mt-3">
            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button class="btn cyan waves-effect waves-light mb-3 modal-trigger" data-target="modal1" type="submit" name="action" onclick="plotting()">Submit
            <i class="mdi-content-send right"></i>
        </button>
    </div>
</div>
<div id="modal1" class="modal" style="min-height: 80% !important">
    <div class="modal-content center-align">
        <h5>Staf Muda EM UB 2019</h5>
        <div class="divider"></div>
        <br>
        <img id="foto" alt="foto calon">
        <h6 id="nama"></h6>
        <div class="input-field col s8 offset-s2">
            <select id="myDropdown" class="materialSelect">
                <option value="" disabled selected>Pilih Divisi</option>
            </select>
            <label>Divisi</label>
        </div>
    </div>
    <br>
    <div class="modal-footer center-align mt-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" class="modal-close modal-action waves-effect waves-green btn" onclick="klik_plotting()" style="float:none">Setuju</a>
    </div>
</div>

<script>
var id_agenda = '<?= $idagenda;?>';
    id_agenda = window.atob(id_agenda);
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })
var nim;

    

    function plotting() {
        nim = $("#nim").val();
        $.ajax({
            
            url:'<?php echo base_url('plotting/get')?>',
            type:'POST',
            data:{
                id_agenda:id_agenda,
                nim:nim
            },
            dataType:'json',
            success:(r)=>{
                console.log(r);
                r.PILIHAN.forEach(element => {
                    $("#myDropdown").append($("<option>").attr("value",element.ID_PILIHAN).text(element.TB_PILIHAN));
                });
            var foto = "https://siakad.ub.ac.id/siam/biodata.fotobynim.php?nim=" + nim + "&key=MzIxZm90b3V5ZTEyMysyMDE4LTA4LTIxIDIxOjA2OjAw";
            $('#foto').attr('src', foto);
            $('#nama').text(r.data.NAMA_LENGKAP);
            }
        })
        
    }


    function klik_plotting() {
        let id_pilihan = $("#myDropdown").val();
        $.ajax({
            url:'<?php echo base_url('plotting/update')?>',
            type:'POST',
            data:{
                id_agenda:id_agenda,
                nim:nim,
                id_pilihan:id_pilihan
            },
            dataType:'json',
            success:(r)=>{
                if(r.error == false){
                    Toast.fire({
                        type: 'success',
                        title: 'Plotting Berhasil Dilakukan'
                    })
                } else{
                    Toast.fire({
                        type: 'error',
                        title: 'Plotting Gagal Dilakukan'
                    })
                }
            }
        })
    }
</script>