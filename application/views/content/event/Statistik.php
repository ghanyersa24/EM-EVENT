<!-- <div class="col m7 s12">
    <h5>Data Statistik</h5>
    <div class="divider"></div>
    <div class="card center-align">
        <br>
        <span class="card-title  grey-text text-darken-4 mt-3">Screening / Validation</span>
        <div class="row mt-3">
            <div class="input-field col s8 m6 offset-s2 offset-m3">
                <input id="nim" type="number" class="validate">
                <label for="nim" class="center-align">NIM</label>
            </div>
        </div>
        <button class="btn cyan waves-effect waves-light mb-3" type="submit" name="action">Submit
            <i class="mdi-content-send right"></i>
        </button>
    </div>
</div> -->
<br>
<div class="card">
    <div class="card-move-up waves-effect waves-block waves-light">
        <div class="move-up cyan darken-1">
            <div>
                <span class="chart-title white-text">Pendaftar Kegiatan</span>
                <div class="chart-revenue cyan darken-2 white-text">
                    <!-- <p class="chart-revenue-total">$4,500.85</p>
                        <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p> -->
                </div>
            </div>
            <div class="trending-line-chart-wrapper">
                <canvas id="trending-line-chart" height="332" width="1430" style="width: 715px; height: 166px;"></canvas>
            </div>
        </div>
    </div>
    <div class="card-content">
        <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
    </div>

    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Detail<i class="mdi-navigation-close right"></i></span>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th data-field="id">ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>


</div>


<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/chartjs/chart.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/') ?>plugins/chartjs/chart-script.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })
    var id_agenda = '<?= $idagenda; ?>';
    id_agenda = window.atob(id_agenda);
    $(document).ready(function() {
        $.ajax({
            url: '<?php echo base_url('statistik/get') ?>',
            type: 'POST',
            data: {
                id_agenda: id_agenda
            },
            dataType: 'json',
            success: (r) => {
                console.log(r);
            }
        })
    })
    var trendingLineChart;
    var data = {
        labels: ["22 Agustus", "23 Agustus", "24 Agustus", "25 Agustus", "26 Agustus", "27 Agustus", "28 Agustus"],
        datasets: [{
                label: "First dataset",
                fillColor: "rgba(128, 222, 234, 0.6)",
                strokeColor: "#ffffff",
                pointColor: "#00bcd4",
                pointStrokeColor: "#ffffff",
                pointHighlightFill: "#ffffff",
                pointHighlightStroke: "#ffffff",
                data: [100, 50, 20, 40, 80, 50, 80]
            },
            {
                label: "Second dataset",
                fillColor: "rgba(128, 222, 234, 0.3)",
                strokeColor: "#80deea",
                pointColor: "#00bcd4",
                pointStrokeColor: "#80deea",
                pointHighlightFill: "#80deea",
                pointHighlightStroke: "#80deea",
                data: [60, 20, 90, 80, 50, 85, 40]
            }
        ]
    };
</script>