<div class="col offset-m1 m10 s12">
    <h5 class="center-align">Atur Jadwal Interview</h5>
    <div id='calendar'></div>
</div>
<div id="add_jadwal" class="modal" style="z-index: 4">
    <div class="modal-content center-align">
        <h5>Jadwal Interview</h5>
        <div class="divider"></div>
        <br>
        <div class="center-align">
            <!-- <form action="" id="presensiform"> -->
            <div class="row">
                <div class="input-field col s8 m6 offset-s2 offset-m3">
                    <input id="add_tanggal_on" type="text" readonly>
                    <input id="add_tanggal" type="text" hidden readonly>
                </div>
                <div class="input-field col s8 m6 offset-s2 offset-m3">
                    <input id="add_kuota" type="number" class="validate">
                    <label for="add_kuota" class="center-align">Kuota</label>
                </div>
            </div>

            <div class="modal-footer mt-3">
                <button class="waves-effect btn-flat" onclick="tutup()" style="float:none"> Tidak </button>
                <button type="submit" class="btn cyan waves-effect waves-light mb-3" style="float:none" onclick="set_jadwal()">Submit
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<div id="edit_jadwal" class="modal" style="z-index: 4">
    <div class="modal-content center-align">
        <h5>Jadwal Interview</h5>
        <div class="divider"></div>

        <br>
        <a href="#!" onclick="hapus_jadwal()" class="secondary-content tooltipped" data-position="right" data-tooltip="Hapus Jadwal"><i class="mdi-content-clear" style="font-size: 25px"></i></a>
        <div class="center-align">
            <!-- <form action="" id="presensiform"> -->
            <div class="row">
                <div class="input-field col s8 m6 offset-s2 offset-m3">
                    <input id="edit_tanggal_on" type="text" readonly>
                    <input id="edit_tanggal" type="text" hidden readonly>
                </div>
                <div class="input-field col s8 m6 offset-s2 offset-m3">
                    <input id="edit_kuota" type="number" class="validate">
                    <label for="edit_kuota" class="center-align">Kuota</label>
                </div>
            </div>

            <div class="modal-footer mt-3">
                <button class="waves-effect btn-flat" onclick="tutup()" style="float:none"> Tidak </button>
                <button type="submit" class="btn cyan waves-effect waves-light mb-3" style="float:none" onclick="update_jadwal()">Submit
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<div id="hapus_jadwal" class="modal" style="z-index: 9999;">
    <div class="modal-content center-align">
        <h5>Pesan Konfirmasi</h5>
        <div class="divider"></div>
        <br>
        <div class="btn-floating btn-large waves-effect waves-light ">
            <i class="mdi-action-delete" style="font-size: 40px"></i>
        </div>
        <h5>Apakah kamu yakin untuk menghapus jadwal ?</h5>
    </div>
    <br>
    <div class="modal-footer center-align mb-3">
        <a href="#" onclick="tutup()" class="waves-effect waves-red btn-flat modal-close" style="float:none">Tidak</a>
        <a href="#!" onclick="klik_hapus_jadwal()" class="modal-close modal-action waves-effect waves-green btn" style="float:none">Setuju</a>
    </div>

</div>

<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/lib/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script>
    var id = 0;
    var id_jadwal = 0;
    var _bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    // $('#calendar').fullCalendar({
    //     header: {
    //         left: 'prev,next today',
    //         center: 'title',
    //         right: 'month,basicWeek,basicDay'
    //     },
    //     defaultDate: new Date(),
    //     editable: true,
    //     eventLimit: true, // allow "more" link when too many events
    //     selectable: true,
    //     selectHelper: true,
    //     select: function(start, end) {
    //         var data = start._d;
    //         var tanggal = data.getDate();
    //         var bulan = data.getMonth();
    //         var tahun = data.getFullYear();
    //         var today = tanggal + ' ' + _bulan[bulan] + ' ' + tahun;
    //         $("#add_tanggal_on").val(today);
    //         $("#add_tanggal").val(tanggal + '-' + (bulan + 1) + '-' + tahun);
    //         $("#add_jadwal").fadeIn();
    //     },
    //     eventRender: function(event, element) {
    //         element.bind('dblclick', function() {
    //             var data = event.start._d;
    //             var tanggal = data.getDate();
    //             var bulan = data.getMonth();
    //             var tahun = data.getFullYear();
    //             var today = tanggal + ' ' + _bulan[bulan] + ' ' + tahun;
    //             $("#edit_tanggal_on").val(today);
    //             $("#edit_tanggal").val(tanggal + '-' + (bulan + 1) + '-' + tahun);
    //             id = event.id;
    //             var temp_title = event.title;
    //             temp_title = temp_title.split(" ");
    //             temp_title = temp_title[3];
    //             temp_title = temp_title.replace(/[()]/g, "");
    //             $('#edit_kuota').val(temp_title);
    //             $('#edit_jadwal').fadeIn();
    //         });
    //     },
    //     eventDrop: function(event, delta, revertFunc) { // si changement de position
    //         var temp_title = event.title;
    //         temp_title = temp_title.split(" ");
    //         temp_title = temp_title[3];
    //         temp_title = temp_title.replace(/[()]/g, "");
    //         event.title = temp_title;
    //         edit(event);

    //     },
    //     eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
    //         alert("fitur ini belum bisa digunakan ya");
    //         $('#calendar').fullCalendar('removeEvents');
    //         load_jadwal();
    //     }
    // });
</script>
<script>
    function load_jadwal() {
        $.ajax({
            url: '<?php echo base_url('jadwal/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    data_calendar(r.data);
                } else {
                    var event = [];
                    event.push(arr_jadwal[0]);
                    event.push(arr_jadwal[1]);
                    $('#calendar').fullCalendar('addEventSource', event);
                    Toast.fire({
                        type: 'info',
                        title: 'Jadwal interview kosong silahkan masukkan jadwal'
                    })
                }
            }
        })
    }

    function data_calendar(data) {
        var event = [];
        var data_color = ["#9c27b0", "#e91e63", "#ff1744", "#aa00ff", "#01579b", "#2196f3", "#ff5722", "#4caf50", "#03a9f4", "#009688"];
        var i = 0;
        data.forEach(element => {
            var obj = {
                "id": element.ID_C_JADWAL,
                "title": 'Interview Day ' + (i + 1) + ' (' + element.BATASAN + ')',
                "start": element.JADWAL,
                "color": data_color[i]
            }
            i++;
            event.push(obj);
        });
        event.push(arr_jadwal[0]);
        event.push(arr_jadwal[1]);
        $('#calendar').fullCalendar('addEventSource', event);
        // $('#calendar').fullCalendar('refetchEvents');
    }

    function set_jadwal() {
        $.ajax({
            url: '<?php echo base_url('jadwal/set') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda,
                jadwal: $('#add_tanggal').val(),
                batasan: $('#add_kuota').val()
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: 'Jadwal Berhasil ditambahkan'
                    })
                    $('#calendar').fullCalendar('removeEvents');
                    load_jadwal();
                    $("#add_kuota").val("");
                    $("#add_jadwal").fadeOut();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Jadwal gagal ditambahkan'
                    })
                    $("#add_jadwal").fadeOut();
                }
            }
        })
    }

    function update_jadwal() {
        $.ajax({
            url: '<?php echo base_url('jadwal/update') ?>',
            type: 'POST',
            data: {
                id_jadwal: id,
                jadwal: $('#edit_tanggal').val(),
                batasan: $('#edit_kuota').val()
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: r.message
                    })
                    $('#calendar').fullCalendar('removeEvents');
                    load_jadwal();
                    $("#edit_kuota").val("");
                    $("#edit_jadwal").fadeOut();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: r.message
                    })
                    $("#edit_jadwal").fadeOut();
                }
            }
        })
    }

    function edit(event) {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        $.ajax({
            url: '<?php echo base_url('jadwal/update') ?>',
            type: 'POST',
            data: {
                id_jadwal: event.id,
                jadwal: start,
                batasan: event.title
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: r.message
                    })
                    $('#calendar').fullCalendar('removeEvents');
                    load_jadwal();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: r.message
                    })
                }
            }
        })
    }

    function hapus_jadwal() {
        $('#edit_jadwal').fadeOut();
        $('#hapus_jadwal').fadeIn();
    }

    function klik_hapus_jadwal() {
        $.ajax({
            url: '<?php echo base_url('jadwal/delete') ?>',
            type: 'POST',
            data: {
                id_jadwal: id,
            },
            dataType: 'json',
            success: (r) => {
                if (!r.error) {
                    Toast.fire({
                        type: 'success',
                        title: r.message
                    })
                    $('#calendar').fullCalendar('removeEvents');
                    load_jadwal();
                    tutup();
                } else {
                    Toast.fire({
                        type: 'error',
                        title: r.message
                    })
                    $("#edit_jadwal").fadeOut();
                }
            }
        })
    }
</script>