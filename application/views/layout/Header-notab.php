<!-- START HEADER DONE -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="nav-left">
                    <li>
                        <h1 class="logo-wrapper" style="margin-left:3vw">
                            <a href="<?=base_url('agenda')?>" class="brand-logo darken-1"><img src="<?= base_url('assets/images/') ?>em-event.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                   
                </div>
                <ul class="nav-right hide-on-med-and-down">
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                    </li>
                    <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                    </li>
                </ul>
                <!-- notifications-dropdown -->
                <ul id="notifications-dropdown" class="dropdown-content">
                    <li>
                        <h5>NOTIFICATIONS 
                            <!-- <span class="new badge">5</span> -->
                        </h5>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!"><i class="mdi-information-outline"></i> Welcome to EM EVENT</a>
                        <!-- <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time> -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->