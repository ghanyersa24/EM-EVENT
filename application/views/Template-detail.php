<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="EM EVENT merupakan Sistem Rekrutmen Terbaik Hari Ini">
    <meta name="keywords" content="EM EVENT merupakan Sistem Rekrutmen Terbaik Hari Ini">
    <title>Admin EM EVENT | EM APPS</title>
    <link rel="icon" href="https://em.ub.ac.id/wp-content/uploads/2019/03/cropped-logo-no-text-01-1-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/') ?>favicon/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/images/') ?>favicon/mstile-144x144.png">

    <link href="<?= base_url('assets/js/') ?>plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/') ?>materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/') ?>style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/') ?>custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/') ?>plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/') ?>plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/') ?>plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/') ?>plugins/fullcalendar/css/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @media only screen and (max-width: 993px) {
            #up {
                margin-top: 5vh;
            }
        }
    </style>
</head>

<body>
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php
    include('layout/Header.php');
    ?>

    <!-- START MAIN -->
    <section>
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV DONE-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= $this->session->userdata('foto') ?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?= $this->session->userdata('nama') ?></a>
                                <p class="user-roal"><?= $this->session->userdata('nim') ?></p>
                            </div>
                        </div>
                    </li>
                    <!-- <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                    </li> -->
                    <li class="bold"><a href="<?= base_url('agenda') ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> My Event</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <?php
                                        foreach ($listagenda as $cetak) {
                                            ?>
                                            <li>
                                                <a href="<?= base_url('presensi/index/' . base64_encode($cetak["ID_AGENDA"])) ?>"><?= character_limiter($cetak['TB_AGENDA'], 10); ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url('logout') ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light cyan" style="margin-top:-0.5vh"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->
            <section id="content">
                <br>
                <div class="container row" id="up">
                    <div id="beranda" class="row">
                        <div class="col m3">
                            <ul class="nav-2">
                                <h5 class=" light-blue-text accent-4"><?= $agenda['TB_AGENDA'] ?></h5>
                                <script>
                                    let agenda = '<?= $agenda['TB_AGENDA'] ?>';
                                </script>
                                <li><a href="<?= base_url("presensi/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-action-spellcheck"></i> Presensi</a>
                                </li>
                                <li><a href="<?= base_url("plotting/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-action-assignment-turned-in"></i> Plotingan</a>
                                </li>
                                <li><a href="<?= base_url("statistik/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-av-equalizer"></i> Data Statistik</a>
                                </li>
                                <li class="bold divisi"><a class="waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Divisi</a>
                                    <ul id="side_divisi"></ul>
                                </li>

                                <div class="divider"></div>
                                <li><a href="<?= base_url("plotting/dropout/$idagenda") ?>"><i class="mdi-hardware-keyboard-tab"></i> Drop Out</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col m8 s12">
                            <h5><?= $title ?></h5>
                            <div class="divider"></div>
                            <?php
                            $this->load->view($content);
                            ?>
                        </div>

                    </div>

                    <div id="pilihan" class="col s12">
                        <?php
                        include('content/event/Pilihan.php');
                        ?>
                    </div>

                    <div id="pengurus" class="col s12">
                        <?php
                        include('content/event/Pengurus.php');
                        ?>
                    </div>
                    <div id="jadwal" class="col s12">
                        <?php
                        include('content/event/Timeline.php');
                        ?>
                    </div>
                </div>
                <!--end container-->
            </section>
        </div>
    </section>
    <!-- END MAIN -->

    <!-- START FOOTER -->
    <br>
    <footer class="col s12">
        <div class="center-align">
            Made with ❤ by PUSKOMINFO EM UB 2019
        </div>
    </footer>
    <!-- END FOOTER -->
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>materialize.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/prism/prism.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins.js"></script>
    <script>
        let data_pilihan = "";
        $(document).ready(function() {
            load_pilihan();
        });

        function load_pilihan() {
            $.ajax({
                url: '<?php echo base_url('pilihan/get') ?>',
                type: 'POST',
                data: {
                    id_agenda: id_agenda
                },
                dataType: 'json',
                success: (r) => {
                    if (!r.error) {
                        data_pilihan = r.data;
                        side_pilihan(data_pilihan);
                        data_divisi(data_pilihan);
                        pilihan_divisi(data_pilihan);
                    } else {
                        data_pilihan = "asdasd";
                    }
                }
            })
        }

        function side_pilihan(data_pilihan) {
            var cetak = "";
            data_pilihan.forEach(element => {
                if (element.HAK == 'BPH') {
                    var pilihan = window.btoa(element.ID_PILIHAN);
                    cetak += '<li ><a href="<?= base_url("divisi/list/$idagenda/") ?>' + pilihan + '" class="waves-effect waves-cyan"> <i class="mdi-image-nature"> </i>' + element.TB_PILIHAN + '</a> </li>'
                }
            });
            $("#side_divisi").html("");
            $("#side_divisi").append(cetak);
        }

        function data_divisi(data_pilihan) {
            let harian = "";
            let inti = "";

            data_pilihan.forEach(element => {
                if (element.HAK == 'BPI') {
                    inti += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.TB_PILIHAN + '<p> Inti</p>' + element.ACTION + '</li>';
                } else {
                    harian += '<li class="collection-item avatar"> <i class="mdi-action-account-circle circle green"></i> <span class="title">' + element.TB_PILIHAN + '<p> Divisi</p>' + element.ACTION + '</li>';
                }
            });

            $("#pilihan_inti").html("");
            $("#pilihan_divisi").html("");
            $("#pilihan_inti").append(inti);
            $("#pilihan_divisi").append(harian);
        }

        function pilihan_divisi(data_pilihan) {
            var pilihan = $("#edit_pilihanPengurus, #add_pilihanPengurus");
            pilihan.html("");
            pilihan.on('contentChanged', function() {
                $(this).material_select();
            })
            data_pilihan.forEach(item => {
                var $newOpt = $("<option>").attr("value", item.ID_PILIHAN).text(item.TB_PILIHAN)
                pilihan.append($newOpt);
                pilihan.trigger('contentChanged');

            });
        }
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: new Date(),
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                var data = start._d;
                var tanggal = data.getDate();
                var bulan = data.getMonth();
                var tahun = data.getFullYear();
                var today = tanggal + ' ' + _bulan[bulan] + ' ' + tahun;
                $("#add_tanggal_on").val(today);
                $("#add_tanggal").val(tanggal + '-' + (bulan + 1) + '-' + tahun);
                $("#add_jadwal").fadeIn();
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    var data = event.start._d;
                    var tanggal = data.getDate();
                    var bulan = data.getMonth();
                    var tahun = data.getFullYear();
                    var today = tanggal + ' ' + _bulan[bulan] + ' ' + tahun;
                    $("#edit_tanggal_on").val(today);
                    $("#edit_tanggal").val(tanggal + '-' + (bulan + 1) + '-' + tahun);
                    id = event.id;
                    var temp_title = event.title;
                    temp_title = temp_title.split(" ");
                    temp_title = temp_title[3];
                    temp_title = temp_title.replace(/[()]/g, "");
                    $('#edit_kuota').val(temp_title);
                    $('#edit_jadwal').fadeIn();
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                var temp_title = event.title;
                temp_title = temp_title.split(" ");
                temp_title = temp_title[3];
                temp_title = temp_title.replace(/[()]/g, "");
                event.title = temp_title;
                edit(event);

            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                alert("fitur ini belum bisa digunakan ya");
                $('#calendar').fullCalendar('removeEvents');
                load_jadwal();
            },
            events: [
                <?php
                $i = 1;
                $j = 0;
                $data_color = ["#9c27b0", "#e91e63", "#ff1744", "#aa00ff", "#01579b", "#2196f3", "#ff5722", "#4caf50", "#03a9f4", "#009688"];
                foreach ($jadwal as $event) {
                    ?> {
                        id: '<?= $event['ID_C_JADWAL']; ?>',
                        title: '<?= "Interview Day $i (" . $event['BATASAN'] . ')'; ?>',
                        start: '<?= $event['JADWAL']; ?>',
                        end: '<?= $event['JADWAL']; ?>',
                        color: '<?= $data_color[$j] ?>'
                    },
                <?php
                    $i++;
                    $j++;
                }
                ?>
                <?php
                $start = explode(" ", $agenda['TGL_BUKA']);
                $end = explode(" ", $agenda['TGL_TUTUP']);
                ?> {
                    title: 'PENDAFTARAN',
                    start: '<?= $start[0] ?>',
                    end: '<?= $end[0] ?>',
                    color: '#88e8f9',
                    editable: false
                },
                {
                    title: 'PENGUMUMAN',
                    start: '<?= $agenda['TGL_PENGUMUMAN'] ?>',
                    color: '#606aec',
                    editable: false
                },
            ]
        });
        var arr_jadwal = [{
                title: 'PENDAFTARAN',
                start: '<?= $start[0] ?>',
                end: '<?= $end[0] ?>',
                color: '#88e8f9',
                editable: false
            },
            {
                title: 'PENGUMUMAN',
                start: '<?= $agenda['TGL_PENGUMUMAN'] ?>',
                color: '#606aec',
                editable: false
            },
        ];
    </script>
</body>

</html>