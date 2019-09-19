<!-- <link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/css/mstepper.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
<style>
    /* Checkboxes
   ========================================================================== */
    /* Remove default checkbox */
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    [type="checkbox"] {
        /* checkbox aspect */
    }

    [type="checkbox"]+span:not(.lever) {
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        display: inline-block;
        height: 25px;
        line-height: 25px;
        font-size: 1rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    [type="checkbox"]+span:not(.lever):before,
    [type="checkbox"]:not(.filled-in)+span:not(.lever):after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 18px;
        height: 18px;
        z-index: 0;
        border: 2px solid #5a5a5a;
        border-radius: 1px;
        margin-top: 3px;
        -webkit-transition: .2s;
        transition: .2s;
    }

    [type="checkbox"]:not(.filled-in)+span:not(.lever):after {
        border: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    [type="checkbox"]:not(:checked):disabled+span:not(.lever):before {
        border: none;
        background-color: rgba(0, 0, 0, 0.42);
    }

    [type="checkbox"].tabbed:focus+span:not(.lever):after {
        -webkit-transform: scale(1);
        transform: scale(1);
        border: 0;
        border-radius: 50%;
        -webkit-box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: rgba(0, 0, 0, 0.1);
    }

    [type="checkbox"]:checked+span:not(.lever):before {
        top: -4px;
        left: -5px;
        width: 12px;
        height: 22px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #26a69a;
        border-bottom: 2px solid #26a69a;
        -webkit-transform: rotate(40deg);
        transform: rotate(40deg);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }

    [type="checkbox"]:checked:disabled+span:before {
        border-right: 2px solid rgba(0, 0, 0, 0.42);
        border-bottom: 2px solid rgba(0, 0, 0, 0.42);
    }

    /* Indeterminate checkbox */
    [type="checkbox"]:indeterminate+span:not(.lever):before {
        top: -11px;
        left: -12px;
        width: 10px;
        height: 22px;
        border-top: none;
        border-left: none;
        border-right: 2px solid #26a69a;
        border-bottom: none;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }

    [type="checkbox"]:indeterminate:disabled+span:not(.lever):before {
        border-right: 2px solid rgba(0, 0, 0, 0.42);
        background-color: transparent;
    }

    [type="checkbox"].filled-in+span:not(.lever):after {
        border-radius: 2px;
    }

    [type="checkbox"].filled-in+span:not(.lever):before,
    [type="checkbox"].filled-in+span:not(.lever):after {
        content: '';
        left: 0;
        position: absolute;
        /* .1s delay is for check animation */
        -webkit-transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        transition: border .25s, background-color .25s, width .20s .1s, height .20s .1s, top .20s .1s, left .20s .1s;
        z-index: 1;
    }

    [type="checkbox"].filled-in:not(:checked)+span:not(.lever):before {
        width: 0;
        height: 0;
        border: 3px solid transparent;
        left: 6px;
        top: 10px;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }

    [type="checkbox"].filled-in:not(:checked)+span:not(.lever):after {
        height: 20px;
        width: 20px;
        background-color: transparent;
        border: 2px solid #5a5a5a;
        top: 0px;
        z-index: 0;
    }

    [type="checkbox"].filled-in:checked+span:not(.lever):before {
        top: 0;
        left: 1px;
        width: 8px;
        height: 13px;
        border-top: 2px solid transparent;
        border-left: 2px solid transparent;
        border-right: 2px solid #fff;
        border-bottom: 2px solid #fff;
        -webkit-transform: rotateZ(37deg);
        transform: rotateZ(37deg);
        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }

    [type="checkbox"].filled-in:checked+span:not(.lever):after {
        top: 0;
        width: 20px;
        height: 20px;
        border: 2px solid #26a69a;
        background-color: #26a69a;
        z-index: 0;
    }

    [type="checkbox"].filled-in.tabbed:focus+span:not(.lever):after {
        border-radius: 2px;
        border-color: #5a5a5a;
        background-color: rgba(0, 0, 0, 0.1);
    }

    [type="checkbox"].filled-in.tabbed:checked:focus+span:not(.lever):after {
        border-radius: 2px;
        background-color: #26a69a;
        border-color: #26a69a;
    }

    [type="checkbox"].filled-in:disabled:not(:checked)+span:not(.lever):before {
        background-color: transparent;
        border: 2px solid transparent;
    }

    [type="checkbox"].filled-in:disabled:not(:checked)+span:not(.lever):after {
        border-color: transparent;
        background-color: #949494;
    }

    [type="checkbox"].filled-in:disabled:checked+span:not(.lever):before {
        background-color: transparent;
    }

    [type="checkbox"].filled-in:disabled:checked+span:not(.lever):after {
        background-color: #949494;
        border-color: #949494;
    }
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="col m8 s12">
    <h5>PUSKOMINFO</h5>
    <div class="divider"></div>
    <br>
    <table id="table" class="responsive-table display" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="35%">Nama</th>
                <th width="20%">Fakultas</th>
                <th width="15%">JADWAL</th>
                <th width="15%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th width="5%">No.</th>
                <th width="35%">Nama</th>
                <th width="20%">Fakultas</th>
                <th width="15%">JADWAL</th>
                <th width="15%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </tbody>
    </table>
</div>
<div id="modal1" class="modal" style="min-height: 100vh !important;width:100vw; margin-top:-14vh; z-index: 999;">
    <div class="modal-content">
        <div class="container row z-depth-3 section grey lighten-3" style="padding-top:1em;padding-bottom:1em;margin-right:0px;margin-left:0px;">
            <img src="../img/logo2.png" class="formlogo" alt="">
            <div class="col s12 l3 center-align">
                <br>
                <img id="foto" src="" alt="">
                <h6 id="nim"></h6>
                <h6 id="nama"></h6>
                <h6 id="fak"></h6>



            </div>

            <div class="col s12 l9">
                <div class="center-align">
                    <h4>FORMULIR</h4>
                    <h5>EM UB 2019</h5>
                </div>

                <div class="">
                    <div class="row">

                        <ul class="stepper linear">
                            <li class="step">
                                <div class="step-title waves-effect waves-dark">Data Diri</div>
                                <div class="step-content">

                                    <div class="row">
                                        <div class="input-field col s6 ">

                                            <select id="select_kelamin" name="jenis_kelamin">
                                                <!-- <option id="select_kelamin1" >--Jenis Kelamin</option> -->
                                                <option value="L" selected>Laki - laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="ipk" name="ipk" type="text" class="validate">
                                            <label for="ipk">IPK</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="panggilan" name="panggilan" type="text" class="validate">
                                            <label for="panggilan">Panggilan</label>

                                        </div>
                                        <div class="input-field col s6">
                                            <input id="cita" name="cita" type="text" class="validate">
                                            <label for="cita">Cita-cita tahun 2030</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="tempat" name="tempat_lahir" type="text" class="validate">
                                            <label for="tempat">Tempat Lahir</label>

                                        </div>
                                        <div class="input-field col s6">
                                            <input id="lahir" name="tanggal_lahir" type="date" class="datepicker validate">
                                            <label for="lahir">Tanggal Lahir</label>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- <input type="text" id="select_darah"> -->
                                        <div class="input-field col s6">
                                            <select id="select_darah" name="darah">
                                                <!-- <option value="" disabled selected>-- Golongan Darah</option> -->
                                                <option value="A" selected>Golongan Darah A</option>
                                                <option id="goldarb" value="B">Golongan Darah B</option>
                                                <option value="AB">Golongan Darah AB</option>
                                                <option value="O">Golongan Darah O</option>
                                            </select>

                                        </div>
                                        <div class="input-field col s6">
                                            <select id="select_agama" name="agama">
                                                <!-- <option value="" disabled selected>-- Agama</option> -->
                                                <option value="ISLAM" selected>ISLAM</option>
                                                <option value="KATOLIK">KATOLIK</option>
                                                <option value="KRISTEN">KRISTEN</option>
                                                <option value="HINDU">HINDU</option>
                                                <option value="BUDHA">BUDHA</option>
                                                <option value="KONGHUCU">KONGHUCHU</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="anak" name="anak" type="number" class="validate">
                                            <label for="anak">Anak Ke</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="dari" name="dari" type="number" class=" validate">
                                            <label for="dari">Dari Bersaudara</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="asal" name="alamat_asal" type="text" class="validate">
                                            <label for="asal">Alamat Asal</label>

                                        </div>
                                        <div class="input-field col s6">
                                            <input id="malang" name="alamat_malang" type="text" class=" validate">
                                            <label for="malang">Alamat Malang</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="hp" name="telp" type="number" class="validate">
                                            <label for="hp">No.Telepon</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="line" name="line" type="text" class=" validate">
                                            <label for="line">ID Line</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="email" name="email" type="text" class=" validate">
                                            <label for="email">E-mail</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="ig" name="ig" type="text" class=" validate">
                                            <label for="ig">Instagram</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="ortu" name="kontak_ortu" type="number" class="validate">
                                            <label for="ortu">No.Telepon Orang Tua</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="wali" name="wali" type="text" class=" validate">
                                            <label for="wali">No. Telepon Wali/Orang Terdekat</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="hobi" name="hobi" type="text" class="validate">
                                            <label for="hobi">Hobi</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="motto" name="motto" type="text" class=" validate">
                                            <label for="motto">Motto Hidup</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="sakit" name="riwayat_sakit" type="text" class=" validate">
                                            <label for="sakit">Riwayat Sakit</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s9">

                                            <select name="pdh" id="pdh">
                                                <option value="" disabled selected>-- UKURAN PDH --</option>
                                                <option value="S">S (54, 64, 58, 42)</option>
                                                <option value="M">M (56, 68, 59, 45)</option>
                                                <option value="L">L (58, 70, 60, 46)</option>
                                                <option value="XL">XL (60, 73, 61, 48)</option>
                                                <option value="XXL">XXL (63, 75, 61.5 50)</option>
                                                <option value="3XL">3XL (66, 76, 62, 52)</option>
                                            </select>

                                        </div>
                                        <div class="input-field col s3">
                                            <label for="hijab">Berhijab
                                                <select name="hijab" id="hijab">
                                                    <option value="on">YA</option>
                                                    <option value="OFf">TIDAK</option>
                                                </select>
                                            </label>
                                            <!-- <div class="switch">
                                                    <label>
                                                        Berhijab
                                                        <input type="checkbox" name="hijab">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div> -->
                                        </div>
                                    </div>
                                    <div class="step-actions">
                                        <!-- <button id="biodataclick"class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continue</button> -->
                                    </div>
                                </div>
                            </li>

                            <li id="step_title" class="step">
                                <div class="step-title waves-effect waves-dark">S W O T</div>
                                <div class="step-content">

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <textarea id="strengths" class="materialize-textarea" name="strengths"></textarea>
                                            <!-- <input  id="strengths" name="strengths" type="text" class="validate"> -->
                                            <label for="strengths">Strengths</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <textarea id="weaknesses" class="materialize-textarea" name="weaknesses"></textarea>
                                            <!-- <input  id="weaknesses" name="weaknesses" type="text" class=" validate"> -->
                                            <label for="weaknesses">Weaknesses & Solusi</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <textarea id="opportunities" class="materialize-textarea" name="opportunities"></textarea>
                                            <!-- <input  id="opportunities" name="opportunities" type="text" class=" validate"> -->
                                            <label for="opportunities">Opportunities</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <textarea id="threats" class="materialize-textarea" name="threats"></textarea>
                                            <!-- <input  id="threats" name="threats" type="text" class=" validate"> -->
                                            <label for="threats">Threats & Solusi</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="step-actions">
                                        <!-- <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing" id="swotclick">Continue</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>
                                </div>
                            </li>

                            <li class="step ">
                                <div class="step-title waves-effect waves-dark">Riwayat Pendidikan</div>
                                <div class="step-content">
                                    <h5>Pendidikan Formal</h5>

                                    <div class="row" id="pf">


                                        <div class="input-field col s4">
                                            <input id="jenjang_pf" name="jenjang_pf[]" value="" type="text" class="validate">
                                            <label for="jenjang_pf">Jenjang</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="instansi_pf" name="instansi_pf[]" value="" type="text" class=" validate">
                                            <label for="instansi_pf">Instansi</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_pf" name="tahun_pf[]" value="" type="number" class=" validate">
                                            <label for="tahun_pf">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addpf"><i class="material-icons right">add</i>button</button>
                                        </div>




                                    </div>
                                    <br>
                                    <h5>Pendidikan Non Formal</h5>

                                    <div class="row" id="pnf">


                                        <div class="input-field col s4">
                                            <input id="jenjang_pnf" name="jenjang_pnf[]" value="" type="text" class="validate">
                                            <label for="jenjang_pnf">Jenjang</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="instansi_pnf" name="instansi_pnf[]" type="text" value="" class=" validate">
                                            <label for="instansi_pnf">Instansi</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_pnf" name="tahun_pnf[]" type="number" class="validate" value="">
                                            <label for="tahun_pnf">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addpnf"><i class="material-icons right">add</i>button</button>
                                        </div>
                                    </div>
                                    <div class="step-actions">

                                        <!-- <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing" id="pendidikanclick">Continue</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>

                                </div>
                            </li>

                            <li class="step ">
                                <div class="step-title waves-effect waves-dark">Riwayat organisasi</div>
                                <div class="step-content">
                                    <h5>Pengalaman organisasi</h5>

                                    <div class="row" id="po">

                                        <div class="input-field col s4">
                                            <input id="jabatan_po" name="jabatan_po[]" type="text" class="validate" value="">
                                            <label for="jabatan_po">Jabatan</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="instansi_po" name="instansi_po[]" type="text" class=" validate" value="">
                                            <label for="instansi_po">Instansi</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_po" name="tahun_po[]" type="number" class=" validate" value="">
                                            <label for="tahun_po">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addpo"><i class="material-icons right">add</i>button</button>
                                        </div>


                                    </div>
                                    <br>
                                    <h5>Organisasi Yang Sedang Diikuti</h5>

                                    <div class="row" id="sd">

                                        <div class="input-field col s4">
                                            <input id="jabatan_sd" name="jabatan_sd[]" type="text" class="validate" value="">
                                            <label for="jabatan_sd">Jabatan</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="instansi_sd" name="instansi_sd[]" type="text" class=" validate" value="">
                                            <label for="instansi_sd">Instansi</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_sd" name="tahun_sd[]" type="number" class=" validate" value="">
                                            <label for="tahun_sd">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addsd"><i class="material-icons right">add</i>button</button>
                                        </div>

                                    </div>
                                    <div class="step-actions">
                                        <!-- <button id="organisasiclick"class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continue</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>
                                </div>
                            </li>


                            <li class="step ">
                                <div class="step-title waves-effect waves-dark">Riwayat Kepanitiaan</div>
                                <div class="step-content">
                                    <h5>Pengalaman Kepanitiaan</h5>

                                    <div class="row" id="pk">

                                        <div class="input-field col s4">
                                            <input id="jabatan_pk" name="jabatan_pk[]" type="text" class="validate" value="">
                                            <label for="jabatan_pk">Jabatan</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="acara_pk" name="acara_pk[]" type="text" class=" validate" value="">
                                            <label for="acara_pk">Nama Acara</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_pk" name="tahun_pk[]" type="number" class=" validate" value="">
                                            <label for="tahun_pk">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addpk"><i class="material-icons right">add</i>button</button>
                                        </div>

                                    </div>
                                    <br>

                                    <h5>Kepanitiaan Yang Sedang/Akan Diikuti 6 Bulan Kedepan</h5>

                                    <div class="row" id="ad">

                                        <div class="input-field col s4">
                                            <input id="jabatan_ad" name="jabatan_ad[]" type="text" class="validate" value="">
                                            <label for="jabatan_ad">Jabatan</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="acara_ad" name="acara_ad[]" type="text" class=" validate" value="">
                                            <label for="acara_ad">Nama Acara</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_ad" name="tahun_ad[]" type="number" class=" validate" value="">
                                            <label for="tahun_ad">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addad"><i class="material-icons right">add</i>button</button>
                                        </div>

                                    </div>
                                    <div class="step-actions">
                                        <!-- <button id="panitiaclick"class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continue</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>
                                </div>
                            </li>


                            <li class="step ">
                                <div class="step-title waves-effect waves-dark">Prestasi</div>
                                <div class="step-content">
                                    <h5>Prestasi</h5>

                                    <div class="row" id="p">

                                        <div class="input-field col s4">
                                            <input id="tingkat_p" name="tingkat_p[]" type="text" class="validate" value="">
                                            <label for="tingkat_p">Tingkat</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="acara_p" name="acara_p[]" type="text" class=" validate" value="">
                                            <label for="acara_p">Prestasi</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_p" name="tahun_p[]" type="number" class=" validate" value="">
                                            <label for="tahun_p">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addp"><i class="material-icons right">add</i>button</button>
                                        </div>

                                    </div>
                                    <br>
                                    <h5>Pengalaman Pembicara / Narasumber / Trainer</h5>

                                    <div class="row" id="t">

                                        <div class="input-field col s4">
                                            <input id="tingkat_t" name="tingkat_t[]" type="text" class="validate" value="">
                                            <label for="tingkat_t">Tingkat</label>

                                        </div>
                                        <div class="input-field col s4">
                                            <input id="acara_t" name="acara_t[]" type="text" class=" validate" value="">
                                            <label for="acara_t">Selaku & Nama Acara</label>

                                        </div>
                                        <div class="input-field col s3">
                                            <input id="tahun_t" name="tahun_t[]" type="number" class=" validate" value="">
                                            <label for="tahun_t">Tahun</label>

                                        </div>
                                        <div class="input-field col s1">
                                            <button class="btn-floating  btn-small" type="button" id="addt"><i class="material-icons right">add</i>button</button>
                                        </div>

                                    </div>
                                    <div class="step-actions">
                                        <!-- <button id="prestasiclick" class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing" id="riwayatclick">CONTINUE</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>
                                </div>
                            </li>

                            <li class="step active">
                                <div class="step-title waves-effect waves-dark">Fasilitas, Jaringan dan Skill</div>
                                <div class="step-content">
                                    <p>Silahkan pilih untuk fasilitas yang dimiliki</p>
                                    <div class="row">
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input name='fasilitas[]' checked type="checkbox" id="Drone" value='Drone' />
                                                    <span>Drone</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='fasilitas[]' type="checkbox" id="Mobil" value='Mobil' />
                                                    <span>Mobil</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='fasilitas[]' type="checkbox" id="Laptop" value='Laptop/Tab' />
                                                    <span>Laptop/Tab</span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input name='fasilitas[]' type="checkbox" id="Kamera" value='Kamera Digital' />
                                                    <span>Kamera Digital</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='fasilitas[]' type="checkbox" id="Motor" value='Motor' />
                                                    <span>Motor</span>
                                                </label>
                                            </p>
                                            <input type="text" for="lainnya" id="lainnya1" name="fasilitas[]" placeholder="lainnya : ...">
                                        </div>
                                    </div>

                                    <p>Silahkan pilih untuk jaringan yang dimiliki</p>
                                    <div class="row">
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input name='jaringan[]' type="checkbox" id="Transportasi" value='Transportasi' />
                                                    <span>Transportasi</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='jaringan[]' type="checkbox" id="Public" value='Public Figure' />
                                                    <span>Public Figure</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='jaringan[]' type="checkbox" id="Desain" value='Desain Grafis / Percetakan' />
                                                    <span>Desain Grafis / Percetakan</span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col s6">

                                            <p>
                                                <label>
                                                    <input name='jaringan[]' type="checkbox" id="Pesta" value='Peralatan Pesta' />
                                                    <span>Peralatan Pesta</span>
                                                </label>
                                            </p>

                                            <p>
                                                <label>
                                                    <input name='jaringan[]' type="checkbox" id="Katering" value='Katering / Makanan' />
                                                    <span>Katering / Makanan</span>
                                                </label>
                                            </p>

                                            <input type="text" for="lainnya" id="lainnya2" name="jaringan[]" placeholder="lainnya : ...">
                                        </div>
                                    </div>

                                    <p>Silahkan pilih untuk keahlian yang dimiliki</p>
                                    <div class="row">
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input name='keahlian[]' type="checkbox" id="Grafis" value='Desain Grafis' />
                                                    <span>Desain Grafis</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='keahlian[]' type="checkbox" id="Multimedia" value='Multimedia / Videografi' />
                                                    <span>Multimedia / Videografi</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='keahlian[]' type="checkbox" id="Ceremony" value='Master of Ceremony' />
                                                    <span>Master of Ceremony</span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col s6">
                                            <p>
                                                <label>
                                                    <input name='keahlian[]' type="checkbox" id="Musik" value='Bermain Alat Musik' />
                                                    <span>Bermain Alat Musik</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name='keahlian[]' type="checkbox" id="Menyetir" value='Menyetir Mobil' />
                                                    <span>Menyetir Mobil</span>
                                                </label>
                                            </p>
                                            <input type="text" for="lainnya" id="lainnya3" name="keahlian[]" placeholder="lainnya : ...">
                                        </div>
                                    </div>

                                    <div class="step-actions">
                                        <!-- <button id="fasilitasclick"class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">CONTINUE</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button> -->
                                    </div>
                                </div>
                            </li>

                            <li class="step">
                                <!-- <div class="step-title waves-effect waves-dark">Finally</div> -->
                                <div class="step-content">
                                    <!-- <div class="input-field col s12">
                                        <select name="pilihan1">
                                            <option value="" selected disabled>PILIH PROKER</option>
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="textarea2" class="materialize-textarea" name="alasan1"
                                                ></textarea>
                                            <label for="textarea2">Alasan</label>
                                        </div>
                                    </div>

                                    <div class="input-field col s12 myd-none">
                                        <select name="pilihan2">
                                            <option value="" disabled selected>-- Pilih Kementerian Kedua --</option>
                                            
                                                    <option value=""></option>";
                                            
                                        </select>
                                    </div>
                                    <div class="row myd-none">
                                        <div class="input-field col s12">
                                            <textarea id="textarea1" class="materialize-textarea" name="alasan2"
                                                ></textarea>
                                            <label for="textarea1" >Alasan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="portofolio" class="materialize-textarea" name="portofolio"
                                                ></textarea>
                                            <label for="portofolio">Link Persyaratan berkas (Jadikan satu link di google drive)</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 myd-none">
                                            <textarea id="textarea3" class="materialize-textarea" name="alasan_umum"
                                                ></textarea>
                                            <label for="textarea3">Alasan Masuk EM</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea id="textarea4" class="materialize-textarea" name="target"
                                                ></textarea>
                                            <label for="textarea4">Sebutkan target selama menjadi ketua pelaksana</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea id="textarea5" class="materialize-textarea" name="ide_kreatif"
                                                ></textarea>
                                            <label for="textarea5">Ide Kreatif yang ingin direalisasikan untuk proker yang dipilih</label>
                                        </div>
                                    </div>
                                    <div class="step-actions">
                                        <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing" id="daftarclick">CONTINUE</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                    </div>
                                </div>
                            </li>
                            <li class="step">
                                <div class="step-title waves-effect waves-dark">Finally</div>
                                <div class="step-content"> -->

                                    <!-- <div class="input-field myd-none" >
                                        <select name="tiket">
                                            <option value="" disabled selected>-- Pilih Jadwal Screening --</option>
                                            
                                                            <option disabled ></option>";
                                                            
                                                        <option value=""></option>";
                                                       
                                                        <option disabled value=""></option>";
                                                    
                                        </select>
                                    </div> -->
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </li>
                        </ul>



                    </div>
                </div>

            </div>

        </div>
    </div>
    <br>
    <div class="modal-footer center-align mt-3">
        <a href="#" class="waves-effect waves-red btn-flat modal-close" id="tutup">Tutup</a>
    </div>
</div>


<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/js/mstepper.min.js"></script>
<script>
    var id_agenda = '<?= $idagenda; ?>';
    var id_pilihan = '<?= $idpilihan; ?>';
    id_agenda = window.atob(id_agenda);
    id_pilihan = window.atob(id_pilihan);
    var dataSet = [];
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })
    $(document).ready(function() {
        $('#table').DataTable({
            "ajax": "<?= base_url('divisi/get/') ?>"+id_agenda+'/'+id_pilihan,
            "columns": [{
                    "data": "NO"
                },
                {
                    "data": "NAMA"
                },
                {
                    "data": "FAKULTAS"
                },
                {
                    "data": "TIKET"
                },
                {
                    "data": "STATUS"
                }, {
                    "data": "ACTION"
                }
            ]
        });

    });

    function buka(nim) {
        $('#nama').text(nim);
        $('#modal1').fadeIn('slow');
        $.ajax({
            url: '<?= base_url('divisi/getBio') ?>',
            type: "POST",
            data: {
                nim: nim,
                id_agenda: id_agenda
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                //BIODATA
                let anakstr = response.data.ANAK;
                let anak = anakstr.split("~");

                $("input[name=ipk]").val(response.data.IPK);
                $("input[name=panggilan]").val(response.data.PANGGILAN);
                $("input[name=cita]").val(response.data.CITA);
                $("input[name=tempat_lahir]").val(response.data.TEMPAT_LAHIR);
                $("input[name=tanggal_lahir]").val(response.data.TANGGAL_LAHIR);
                let get_kelamin = response.data.JENIS_KELAMIN;

                $("option[value=" + get_kelamin + "]").attr("selected", true);
                let get_darah = response.data.DARAH;

                $("option[value=" + get_darah + "]").attr("selected", true);
                let get_agama = response.data.AGAMA;
                $("option[value=" + get_agama + "]").attr("selected", true);
                let get_pdh = response.data.PDH;
                $("option[value=" + get_pdh + "]").attr("selected", true);

                $("input[name=anak]").val(anak[0]);
                $("input[name=dari]").val(anak[1]);
                $("input[name=alamat_asal]").val(response.data.ALAMAT_ASAL);
                $("input[name=alamat_malang]").val(response.data.ALAMAT_MALANG);
                $("input[name=telp]").val(response.data.TELPON);
                $("input[name=line]").val(response.data.LINE);
                $("input[name=email]").val(response.data.EMAIL);
                $("input[name=ig]").val(response.data.INSTAGRAM);
                $("input[name=kontak_ortu]").val(response.data.KONTAK_ORTU);
                $("input[name=wali]").val(response.data.WALI);
                $("input[name=hobi]").val(response.data.HOBI);
                $("input[name=motto]").val(response.data.MOTTO);
                $("input[name=riwayat_sakit]").val(response.data.RIWAYAT_SAKIT);
                $("textarea[name=portofolio]").val(response.data.PORTOFOLIO);

                //SWOT
                $("textarea[id=strengths]").val(response.data.STRENGTHS);
                $("textarea[id=weaknesses]").val(response.data.WEAKNESS);
                $("textarea[id=opportunities]").val(response.data.OPPORTUNITIES);
                $("textarea[id=threats]").val(response.data.THREATS);
                //PENDIDIKAN

                let pf = response.data.PENDIDIKAN_FORMAL;
                let i = 0;
                pf.forEach(data => {
                    if (i == 0) {
                        $('input[name="jenjang_pf[]"]').val(data["JENJANG"]);
                        $('input[name="instansi_pf[]"]').val(data["INSTANSI"]);
                        $('input[name="tahun_pf[]"]').val(data["TAHUN"]);
                    } else {
                        $("#pf").append(
                            '<div><div class="input-field col s4"><input id="jenjang_pf" name="jenjang_pf[]" type="text" class="validate" value=' +
                            data["JENJANG"] +
                            '><label for="jenjang_pf">Jenjang</label></div><div class="input-field col s4"><input id="instansi_pf" name="instansi_pf[]" type="text" class=" validate" value=' +
                            data["INSTANSI"] +
                            '><label for="instansi_pf">Instansi</label></div><div class="input-field col s3"><input id="tahun_pf" name="tahun_pf[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_pf">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });

                let pnf = response.data.PENDIDIKAN_NON_FORMAL;
                i = 0;

                pnf.forEach(data => {
                    if (i == 0) {
                        $('input[name="jenjang_pnf[]"]').val(data["JENJANG"]);
                        $('input[name="instansi_pnf[]"]').val(data["INSTANSI"]);
                        $('input[name="tahun_pnf[]"]').val(data["TAHUN"]);
                    } else {
                        $("#pnf").append(
                            '<div><div class="input-field col s4"><input id="jenjang_pnf" name="jenjang_pnf[]" type="text" class="validate" value=' +
                            data["JENJANG"] +
                            '><label for="jenjang_pnf">Jenjang</label></div><div class="input-field col s4"><input id="instansi_pnf" name="instansi_pnf[]" type="text" class=" validate" value=' +
                            data["INSTANSI"] +
                            '><label for="instansi_pnf">Instansi</label></div><div class="input-field col s3"><input id="tahun_pnf" name="tahun_pnf[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_pnf">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });

                //ORGANISASI
                let po = response.data.PENGALAMAN_ORGANISASI;
                i = 0;

                po.forEach(data => {
                    if (i == 0) {
                        $('input[name="jabatan_po[]"]').val(data["JABATAN"]);
                        $('input[name="instansi_po[]"]').val(data["INSTANSI"]);
                        $('input[name="tahun_po[]"]').val(data["TAHUN"]);
                    } else {
                        $("#po").append(
                            '<div><div class="input-field col s4"><input id="jabatan_po" name="jabatan_po[]" type="text" class="validate" value=' +
                            data["JABATAN"] +
                            '><label for="jabatan_po">Jabatan</label></div><div class="input-field col s4"><input id="instansi_po" name="instansi_po[]" type="text" class=" validate" value=' +
                            data["INSTANSI"] +
                            '><label for="instansi_po">Instansi</label></div><div class="input-field col s3"><input id="tahun_po" name="tahun_po[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_po">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });

                let sd = response.data.ORGANISASI_DIIKUTI;
                i = 0;

                sd.forEach(data => {
                    if (i == 0) {
                        $('input[name="jabatan_sd[]"]').val(data["JABATAN"]);
                        $('input[name="instansi_sd[]"]').val(data["INSTANSI"]);
                        $('input[name="tahun_sd[]"]').val(data["TAHUN"]);
                    } else {
                        $("#sd").append(
                            '<div><div class="input-field col s4"><input id="jabatan_sd" name="jabatan_sd[]" type="text" class="validate" value=' +
                            data["JABATAN"] +
                            '><label for="jabatan_sd">Jabatan</label></div><div class="input-field col s4"><input id="instansi_sd" name="instansi_sd[]" type="text" class=" validate" value=' +
                            data["INSTANSI"] +
                            '><label for="instansi_sd">Instansi</label></div><div class="input-field col s3"><input id="tahun_sd" name="tahun_sd[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_sd">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });
                //KEPANITIAAN
                let pk = response.data.PENGALAMAN_KEPANITIAAN;
                i = 0;

                pk.forEach(data => {
                    if (i == 0) {
                        $('input[name="jabatan_pk[]"]').val(data["JABATAN"]);
                        $('input[name="acara_pk[]"]').val(data["ACARA"]);
                        $('input[name="tahun_pk[]"]').val(data["TAHUN"]);
                    } else {
                        $("#pk").append(
                            '<div><div class="input-field col s4"><input id="jabatan_pk" name="jabatan_pk[]" type="text" class="validate" value=' +
                            data["JABATAN"] +
                            '><label for="jabatan_pk">Jabatan</label></div><div class="input-field col s4"><input id="acara_pk" name="acara_pk[]" type="text" class=" validate" value=' +
                            data["ACARA"] +
                            '><label for="acara_pk">Acara</label></div><div class="input-field col s3"><input id="tahun_pk" name="tahun_pk[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_pk">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });

                let ad = response.data.KEPANITIAAN_DIIKUTI;
                i = 0;

                ad.forEach(data => {
                    if (i == 0) {
                        $('input[name="jabatan_ad[]"]').val(data["JABATAN"]);
                        $('input[name="acara_ad[]"]').val(data["ACARA"]);
                        $('input[name="tahun_pk[]"]').val(data["TAHUN"]);
                    } else {
                        $("#ad").append(
                            '<div><div class="input-field col s4"><input id="jabatan_ad" name="jabatan_ad[]" type="text" class="validate" value=' +
                            data["JABATAN"] +
                            '><label for="jabatan_ad">Jabatan</label></div><div class="input-field col s4"><input id="acara_ad" name="acara_ad[]" type="text" class=" validate" value=' +
                            data["ACARA"] +
                            '><label for="acara_ad">Acara</label></div><div class="input-field col s3"><input id="tahun_ad" name="tahun_ad[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_ad">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });
                //PRESTASI
                let p = response.data.PRESTASI;
                i = 0;

                p.forEach(data => {
                    if (i == 0) {
                        $('input[name="tingkat_p[]"]').val(data["TINGKAT"]);
                        $('input[name="acara_p[]"]').val(data["ACARA"]);
                        $('input[name="tahun_p[]"]').val(data["TAHUN"]);
                    } else {
                        $("#p").append(
                            '<div><div class="input-field col s4"><input id="tingkat_p" name="tingkat_p[]" type="text" class="validate" value=' +
                            data["TINGKAT"] +
                            '><label for="tingkat_p">Tingkat</label></div><div class="input-field col s4"><input id="ACARA_p" name="ACARA_p[]" type="text" class=" validate" value=' +
                            data["ACARA"] +
                            '><label for="acara_p">Acara</label></div><div class="input-field col s3"><input id="tahun_p" name="tahun_p[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_p">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });

                let t = response.data.PERFORM;
                i = 0;

                t.forEach(data => {
                    if (i == 0) {
                        $('input[name="tingkat_t[]"]').val(data["ACARA"]);
                        $('input[name="acara_t[]"]').val(data["PERFORMER"]);
                        $('input[name="tahun_t[]"]').val(data["TAHUN"]);
                    } else {
                        $("#t").append(
                            '<div><div class="input-field col s4"><input id="tingkat_p" name="tingkat_t[]" type="text" class="validate" value=' +
                            data["ACARA"] +
                            '><label for="tingkat_t">Tingkat</label></div><div class="input-field col s4"><input id="acara_t" name="acara_t[]" type="text" class=" validate" value=' +
                            data["PERFORMER"] +
                            '><label for="acara_t">Selaku & Nama Acara</label></div><div class="input-field col s3"><input id="tahun_t" name="tahun_t[]" type="number" class=" validate" value=' +
                            data["TAHUN"] +
                            '><label for="tahun_t">Tahun</label></div><div class="col s1"><a href="#" class="remove_field btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a></div></div>'
                        );
                    }
                    i++;
                });
                let fasilstr = response.data.FASILITAS;
                let fasil = fasilstr.split("~");

                fasil.forEach(data => {
                    if ("Drone" == data) {
                        $("#Drone").attr("checked", true);
                    } else if ("Mobil" == data) {
                        $("#Mobil").attr("checked", true);
                    } else if ("Laptop/Tab" == data) {
                        $("#Laptop").attr("checked", true);
                    } else if ("Kamera Digital" == data) {
                        $("#Kamera").attr("checked", true);
                    } else if ("Motor" == data) {
                        $("#Motor").attr("checked", true);
                    } else {
                        $("#lainnya1").val(data);
                    }
                });

                let jaringanstr = response.data.JARINGAN;
                let jaringan = jaringanstr.split("~");

                jaringan.forEach(data => {
                    if ("Transportasi" == data) {
                        $("#Transportasi").attr("checked", true);
                    } else if ("Public Figure" == data) {
                        $("#Public").attr("checked", true);
                    } else if ("Desain Grafis / Percetakan" == data) {
                        $("#Desain").attr("checked", true);
                    } else if ("Peralatan Pesta" == data) {
                        $("#Pesta").attr("checked", true);
                    } else if ("Katering / Makanan" == data) {
                        $("#Katering").attr("checked", true);
                    } else {
                        $("#lainnya2").val(data);
                    }
                });

                let keahlianstr = response.data.KEAHLIAN;
                let keahlian = keahlianstr.split("~");

                keahlian.forEach(data => {
                    if ("Desain Grafis" == data) {
                        $("#Grafis").attr("checked", true);
                    } else if ("Multimedia / Videografi" == data) {
                        $("#Multimedia").attr("checked", true);
                    } else if ("Master of Ceremony" == data) {
                        $("#Ceremony").attr("checked", true);
                    } else if ("Bermain Alat Musik" == data) {
                        $("#Musik").attr("checked", true);
                    } else if ("Menyetir Mobil" == data) {
                        $("#Menyetir").attr("checked", true);
                    } else {
                        $("#lainnya3").val(data);
                    }
                });

                //DAFTAR

                //GET DAFTAR

                inputfocus();
            }
        });
    }

    function inputfocus() {
        if ($("input,textarea").val()) {
            $("input,textarea").focus();
            $("label").css({
                transform: "translateY(-15px)",
                "font-size": "12px"
            });
        }
    }
    $('#tutup').click(function() {
        $('#modal1').fadeOut('slow');
    });
</script>