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
    <section id="">
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV DONE-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url('assets/images/') ?>avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Ghany Abdillah Ersa</a>
                                <p class="user-roal">Administrator</p>
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
                <!--start container-->
                <div class="container row">
                    <div id="beranda" class="row">
                        <div class="col m3">
                            <ul class="nav-2">
                                <h5 class=" light-blue-text accent-4"><?= $agenda ?></h5>
                                <li><a href="<?= base_url("presensi/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-action-spellcheck"></i> Presensi</a>
                                </li>
                                <li><a href="<?= base_url("plotting/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-action-assignment-turned-in"></i> Plotingan</a>
                                </li>
                                <li><a href="<?= base_url("statistik/index/$idagenda") ?>" class="waves-effect waves-cyan"><i class="mdi-av-equalizer"></i> Data Statistik</a>
                                </li>
                                <li class="bold divisi"><a class="waves-effect waves-cyan"><i class="mdi-social-location-city"></i> Divisi</a>
                                    <ul>
                                        <?php
                                        foreach ($divisi as $cetak) {
                                            $idpilihan = base64_encode($cetak['ID_PILIHAN']);
                                            ?>
                                            <li><a href="<?= base_url("divisi/list/$idagenda/$idpilihan") ?>" class="waves-effect waves-cyan"><i class="mdi-image-nature"></i> <?= $cetak['TB_PILIHAN'] ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
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
</body>

</html>