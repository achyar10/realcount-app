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
                                    <div class="text-right">{{ number_format($candidate['total_vote'], 0, ',', '.') }} suara</div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center middle text-success font-weight-bold"
                                style="font-size: 25px;">Total Suara Sah</td>
                            <td>
                                <div class="percentext text-success">100%</div>
                                <div class="text-right">{{ number_format($totalVote, 0, ',', '.') }} suara</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center middle text-danger font-weight-bold"
                                style="font-size: 25px;">Suara Tidak Sah</td>
                            <td>
                                <div class="percentext text-danger">{{ $invalidPercent }}%</div>
                                <div class="text-right">{{ number_format($invalidVote, 0, ',', '.') }} suara</div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <hr>

        <h5>Rekapitulasi Per TPS</h5>
        <form action="" method="get">
            <div class="form-group">
                <label for="">Wilayah Pemilihan</label>
                <select name="district_id" id="" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua Wilayah Pemilihan</option>
                    @foreach ($districts as $district)
                        <option value="{{$district->id}}" {{ old('district_id', request()->district_id) == $district->id ? 'selected' : null }}>{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead class="text-white text-center" style="background-color: #F08419">
                    <tr>
                        <th class="align-middle" rowspan="2">No</th>
                        <th class="align-middle" rowspan="2">TPS</th>
                        <th class="align-middle" rowspan="2">Total DPT</th>
                        <th class="align-middle" rowspan="2">Tidak Hadir</th>
                        <th class="align-middle" rowspan="2">Total Suara</th>
                        <th class="align-middle" rowspan="2">No Urut</th>
                        <th class="align-middle" rowspan="2">Nama Calon</th>
                        <th class="align-middle" rowspan="2">Total Hasil</th>
                        <th class="align-middle" rowspan="2">Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($api as $detail)
                        <tr>
                            <td rowspan="{{ count($detail['candidates']) + 1 }}" class="align-middle">
                                {{ $loop->iteration }}</td>
                            <td rowspan="{{ count($detail['candidates']) + 1 }}" class="align-middle">
                                {{ $detail['no_tps'] }} <br>
                                    @if (!empty($detail['plano']))
                                        <a href="{{ asset('plano/'.$detail['plano'])}}" target="_blank" class="btn btn-sm btn-danger">Plano</a>
                                    @endif
                            </td>
                            <td rowspan="{{ count($detail['candidates']) + 1 }}" class="text-center align-middle">
                                {{ $detail['total_dpt'] }}</td>
                            <td rowspan="{{ count($detail['candidates']) + 1 }}" class="text-center align-middle">
                                {{ $detail['absen'] }}</td>
                            <td rowspan="{{ count($detail['candidates']) + 1 }}" class="text-center align-middle">
                                {{ $detail['total_suara'] }}</td>
                            @foreach ($detail['candidates'] as $can)
                                @if ($can['sort_number'] != 99)
                                    <td>No {{ $can['sort_number'] }}</td>
                                    <td>{{ $can['name'] }}</td>
                                    <td class="text-center font-weight-bold">{{ number_format($can['total_vote'], 0, ',', '.') }}</td>
                                    <td class="text-center font-weight-bold">{{ $can['percent'] }}%</td>
                                </tr>
                                @else
                                    <td colspan="2" class="text-center text-success">Total Suara Sah</td>
                                    <td class="text-center font-weight-bold text-success">{{ number_format($can['grand_total_vote'], 0, ',', '.') }}</td>
                                    <td class="text-center font-weight-bold text-success">{{ $can['grand_total_percent'] }}%</td>
                                    </tr>
                                    <td colspan="2" class="text-center text-danger">Total {{ $can['name'] }}</td>
                                    <td class="text-center font-weight-bold text-danger">
                                        {{ number_format($can['total_vote'], 0, ',', '.') }}</td>
                                    <td class="text-center font-weight-bold text-danger">{{ $can['percent'] }}%</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
            name: '<?php echo $key['name']; ?>',
            y: <?php echo $key['y']; ?>
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
