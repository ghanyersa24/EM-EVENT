<div class="col offset-m1 m10 s12">
    <div id="full-calendar">
        <div class="row">
            <div class="col s12 m4 l3">
                <div id='external-events'>
                    <h4 class="header">Draggable Events</h4>
                    <div class='fc-event cyan'>March Invoices</div>
                    <div class='fc-event teal'>Call Emy</div>
                    <div class='fc-event cyan darken-1'>Dinner with Team</div>
                    <div class='fc-event cyan accent-4'>Meeting with Support Team</div>
                    <div class='fc-event teal accent-4'>Meeting with Sales Team</div>
                    <div class='fc-event light-blue accent-3'>Design an iOS App</div>
                    <div class='fc-event light-blue accent-4'>Company Party</div>
                    <p>
                        <input type='checkbox' id='drop-remove' />
                        <label for='drop-remove'>remove after drop</label>
                    </p>
                </div>
            </div>
            <div class="col s12 m8 l9">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/lib/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/fullcalendar/fullcalendar-script.js"></script>