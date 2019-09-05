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

<div class="col s12 m8">
    <h5>Data Statistik</h5>
    <div class="divider"></div>
    <div class="card">
        <div class="card-move-up waves-effect waves-block waves-light">
            <div class="move-up cyan darken-1">
                <div>
                    <span class="chart-title white-text">Pendaftar Kegiatan</span>
                    <div class="chart-revenue cyan darken-2 white-text">
                        <p class="chart-revenue-total">$4,500.85</p>
                        <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
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
                        <th data-field="month">Month</th>
                        <th data-field="item-sold">Item Sold</th>
                        <th data-field="item-price">Item Price</th>
                        <th data-field="total-profit">Total Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>January</td>
                        <td>122</td>
                        <td>100</td>
                        <td>$122,00.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>February</td>
                        <td>122</td>
                        <td>100</td>
                        <td>$122,00.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>March</td>
                        <td>122</td>
                        <td>100</td>
                        <td>$122,00.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>April</td>
                        <td>122</td>
                        <td>100</td>
                        <td>$122,00.00</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</div>