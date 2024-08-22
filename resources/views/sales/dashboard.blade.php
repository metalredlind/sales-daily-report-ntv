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
                        {{-- <select id="team-select" onchange="updateDashboard()">
                            <option value="all">ALL TEAM</option>
                            <option value="team1">Team 1</option>
                            <option value="team2">Team 2</option>
                            <option value="team3">Team 3</option>
                        </select> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="team-tables">
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
    </div> --}}

    <div class="col-3">
        <!-- Date Range Picker Input -->
        <label>Date Range Picker</label>
        <div class="input-group">
            <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-calendar"></i>
            </div>
            </div>
            <input type="text" id="daterange" class="form-control daterange-cus" placeholder="Select Date Range">
        </div>
    </div>

    {{ $dataTable->table() }}

</section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
