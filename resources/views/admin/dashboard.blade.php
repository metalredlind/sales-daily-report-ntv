@extends('admin.layouts.master')
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
        @foreach($teamData as $teamName => $data)
        <div class="col-12">
            <h4>Team: {{ $teamName }}</h4>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Target Bulan Ini</h4>
                    </div>
                    <div class="card-body">
                        Rp {{ number_format($data['target_team']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Realisasi Bulan Ini</h4>
                    </div>
                    <div class="card-body">
                        Rp {{ number_format($data['realisasi_team']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Selisih/Varian</h4>
                    </div>
                    <div class="card-body">
                        Rp {{ number_format($data['selisih_varian_team']) }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection
