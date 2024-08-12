@extends('sales.layouts.master')
@section('content')
<style>
    .hidden { display: none; }
    .profit { color: green; }
    .loss { color: red; }
</style>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Target Juli (Rp)</h4>
                    </div>
                    <div class="card-body" id="target-juli">
                        1000000000000
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Realisasi (Rp)</h4>
                    </div>
                    <div class="card-body" id="realisasi">
                        500000000
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Selisih/Varian (Rp)</h4>
                    </div>
                    <div class="card-body" id="selisih">
                        999500000000
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Team:</h4>
                    </div>
                    <div class="card-body">
                        <select id="team-select" onchange="updateDashboard()">
                            <option value="all">ALL TEAM</option>
                            <option value="team1">Team 1</option>
                            <option value="team2">Team 2</option>
                            <option value="team3">Team 3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="team-tables">
        <table class="table hidden" id="table-team">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Waktu</th>
                    <th>Nama Tim Bertugas</th>
                    <th>Nama Brand/Klien</th>
                    <th>Jenis Kegiatan</th>
                    <th>Follow Up</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <tr>
                    <td>1</td>
                    <td>7-4-2024, 08:00</td>
                    <td>Tim 1</td>
                    <td>Brand 1</td>
                    <td>Bahas I</td>
                    <td><div class="badge badge-success">Deal</div></td>
                    <td><a href="" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<script>
    const data = {
        all: { target: 100000000, realisasi: 50000 },
        team1: { target: 40000000, realisasi: 20000 },
        team2: { target: 30000000, realisasi: 15000 },
        team3: { target: 30000000, realisasi: 15000 }
    };

    const tableRows = {
        all: [
            { waktu: '7-4-2024, 08:00', team: 'Tim 1', brand: 'Brand 1', kegiatan: 'Bahas I', followUp: 'Deal', followUpClass: 'success', action: 'exampleModal' },
            { waktu: '7-15-2024, 09:00', team: 'Tim 2', brand: 'Brand 2', kegiatan: 'Bahas 2', followUp: 'Deal', followUpClass: 'success', action: 'exampleModal' },
            { waktu: '7-14-2024, 08:00', team: 'Tim 3', brand: 'Brand 3', kegiatan: 'Bahas 3', followUp: 'No Deal', followUpClass: 'danger', action: 'exampleModal' }
        ],
        team1: [
            { waktu: '7-4-2024, 08:00', team: 'Tim 1', brand: 'Brand 1', kegiatan: 'Bahas I', followUp: 'Deal', followUpClass: 'success', action: 'exampleModal' }
        ],
        team2: [
            { waktu: '7-15-2024, 09:00', team: 'Tim 2', brand: 'Brand 2', kegiatan: 'Bahas 2', followUp: 'Deal', followUpClass: 'success', action: 'exampleModal' }
        ],
        team3: [
            { waktu: '7-14-2024, 08:00', team: 'Tim 3', brand: 'Brand 3', kegiatan: 'Bahas 3', followUp: 'No Deal', followUpClass: 'danger', action: 'exampleModal' }
        ]
    };

    function updateDashboard() {
        const team = document.getElementById('team-select').value;
        const targetElement = document.getElementById('target-juli');
        const realisasiElement = document.getElementById('realisasi');
        const selisihElement = document.getElementById('selisih');

        const target = data[team].target;
        const realisasi = data[team].realisasi;
        const selisih = target - realisasi;

        targetElement.textContent = target;
        realisasiElement.textContent = realisasi;
        selisihElement.textContent = selisih;
        selisihElement.className = selisih >= 0 ? 'loss' : 'profit';

        const tableBody = document.getElementById('table-body');
        tableBody.innerHTML = '';
        tableRows[team].forEach((row, index) => {
            tableBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${row.waktu}</td>
                    <td>${row.team}</td>
                    <td>${row.brand}</td>
                    <td>${row.kegiatan}</td>
                    <td><div class="badge badge-${row.followUpClass}">${row.followUp}</div></td>
                    <td><a href="" class="btn btn-dark" data-toggle="modal" data-target="#${row.action}"><i class="fa fa-eye"></i></a></td>
                </tr>
            `;
        });

        document.getElementById('table-team').classList.remove('hidden');
    }
</script>
@endsection
