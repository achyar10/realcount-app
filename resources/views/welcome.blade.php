<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemilu 2024 - Waringin Jaya</title>
    <link rel="shortcut icon" href="/assets/images/logo.webp">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,500;0,600;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/landing/css/bootstrap.min.css">
    <link rel="stylesheet" href="/landing/css/styles.css">
    <script src="/landing/js/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-danger sticky-top">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/logo.webp" height="50" alt="">
            <span class="text-white font-weight-bold">PEMILU 2024</span>
        </a>
    </nav>
    <div class="container mt-4">
        <h2>Panitia Pemungutan Suara</h2>
        <p>Desa Waringin Jaya</p>
        <div class="row">
            <div class="col-12">
                {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    text here
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
            </div>
            <div class="col-12">
                <h5>Data masuk: {{ $tpsVote }} dari {{ $tpsTotal }} TPS</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%;"
                        aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover bordered">
                        <tr>
                            <td>No Urut</td>
                            <td>Foto Calon</td>
                            <td>Nama Calon</td>
                            <td>Persentase</td>
                        </tr>
                        @foreach ($candidates as $candidate)
                            <tr class="border-bottom">
                                <td class="middle text-center font-weight-bold">{{ $candidate['sort_number'] }}</td>
                                <td><img src="{{ asset('candidate/' . $candidate['image']) }}" height="100"
                                        width="100" alt=""></td>
                                <td class="middle">{{ $candidate['name'] }}</td>
                                <td>
                                    <div class="percentext">{{ $candidate['percent'] }}%</div>
                                    <div class="text-right">{{ $candidate['total_vote'] }} suara</div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center middle text-danger font-weight-bold"
                                style="font-size: 25px;">Total Suara Sah</td>
                            <td>
                                <div class="percentext">100%</div>
                                <div class="text-right">{{ $totalVote }} suara</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center middle text-warning font-weight-bold"
                                style="font-size: 25px;">Suara Tidak Sah</td>
                            <td>
                                <div class="percentext text-warning">{{ $invalidPercent }}%</div>
                                <div class="text-right">{{ $invalidVote }} suara</div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <hr>

        <h5>Rekapitulasi Per TPS</h5>
        {{-- <form action="" method="get">
            <div class="form-group">
                <label for="">Wilayah Pemilihan</label>
                <select name="districtId" id="" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua Wilayah Pemilihan</option>
                    {{#each districts}}
                        <option value="{{id}}" {{#ifCond id ../districtId}} selected {{/ifCond}}>{{name}}</option>
                    {{/each}}
                </select>
            </div>
        </form> --}}
        {{-- <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead class="bg-success text-white text-center">
                    <tr>
                        <th class="align-middle" rowspan="2">No</th>
                        <th class="align-middle" rowspan="2">TPS</th>
                        <th class="align-middle" rowspan="2">Total DPT</th>
                        <th class="align-middle" rowspan="2">Tidak Hadir</th>
                        <th class="align-middle" rowspan="2">Total Suara</th>
                        <th class="align-middle" rowspan="2">No Urut</th>
                        <th class="align-middle" rowspan="2">Nama Calon</th>
                        {{#if settings.app_gender}}
                            <th colspan="2">Jumlah Suara</th>
                        {{/if}}
                        <th class="align-middle" rowspan="2">Total Hasil</th>
                        <th class="align-middle" rowspan="2">Persentase</th>
                    </tr>
                    {{#if settings.app_gender}}
                        <tr>
                            <th>Laki-laki</th>
                            <th>Perempuan</th>
                        </tr>
                    {{/if}}
                </thead>
                <tbody>
                    {{#each api}}
                        <tr>
                            <td rowspan="{{ math (Length candidates) "+" 1 }}" class="align-middle">{{inc @index}}</td>
                            <td rowspan="{{ math (Length candidates) "+" 1 }}" class="align-middle">
                                {{no_tps}} <br>
                                {{#ifNotEq plano null}}
                                    <a href="{{plano}}" target="_blank" class="btn btn-sm btn-info">Plano</a>
                                {{/ifNotEq}}
                            </td>
                            <td rowspan="{{ math (Length candidates) "+" 1 }}" class="text-center align-middle">{{numberFormat total_dpt}}</td>
                            <td rowspan="{{ math (Length candidates) "+" 1 }}" class="text-center align-middle">{{numberFormat absen}}</td>
                            <td rowspan="{{ math (Length candidates) "+" 1 }}" class="text-center align-middle">{{numberFormat total_suara}}</td>
                            {{#each candidates}}
                                {{#ifNotEq no_urut 99}}
                                    <td>No {{no_urut}}</td>
                                    <td>{{name}}</td>
                                    {{#if ../../settings.app_gender}}
                                    <td class="text-center font-weight-bold">{{numberFormat total_male}}</td>
                                    <td class="text-center font-weight-bold">{{numberFormat total_female}}</td>
                                    {{/if}}
                                    <td class="text-center font-weight-bold">{{numberFormat total_suara}}</td>
                                    <td class="text-center font-weight-bold">{{percent}}%</td>
                                    </tr>
                                {{else}}
                                    <td colspan="2" class="text-center text-success">Total Suara Sah</td>
                                    <td {{#if ../../settings.app_gender}} colspan="3" {{/if}} class="text-center font-weight-bold text-success">{{numberFormat grand_total}}</td>
                                    <td class="text-center font-weight-bold text-success">{{grand_total_percent}}%</td>
                                    </tr>
                                    <td colspan="2" class="text-center text-danger">Total {{name}}</td>
                                    <td {{#if ../../settings.app_gender}} colspan="3" {{/if}} class="text-center font-weight-bold text-danger">
                                        {{numberFormat total_suara}}</td>
                                    <td class="text-center font-weight-bold text-danger">{{percent}}%</td>
                                    </tr>
                                {{/ifNotEq}}
                            {{/each}}
                            </tr>
                        </tr>
                    {{/each}}
                </tbody>
            </table>
        </div> --}}

    </div>
    <footer class="mt-3">
        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                All rights reserved.
                                <a href="#">Achyar Anshorie&trade;</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let dataPie = []
        <?php foreach ($pie as $key) : ?>
        dataPie.push({
            name: '<?php echo $key['name'] ?>',
            y: <?php echo $key['y'] ?>
        })
        <?php endforeach ?>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Hasil Hitung TPS'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
            },
            credits: {
                enabled: false
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.2f} %'
                    }
                }
            },
            series: [{
                name: 'Persentase',
                colorByPoint: true,
                data: dataPie
            }]
        });
    </script>

    <script src="/landing/js/bootstrap.min.js"></script>
</body>

</html>
