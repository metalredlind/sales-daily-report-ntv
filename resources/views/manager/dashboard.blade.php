@extends('manager.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Team</h4>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Target Bulan Ini</h4>
                    </div>
                    <div class="card-body" id="target-juli">
                        Rp {{ number_format($target_team) }}
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
                        <h4>Realisasi Bulan Ini</h4>
                    </div>
                    <div class="card-body" id="realisasi">
                        Rp {{ number_format($realisasi_team) }}
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
                        <h4>Selisih/Varian</h4>
                    </div>
                    <div class="card-body" id="selisih">
                        Rp {{ number_format($selisih_varian_team) }}
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
                        {{Auth::user()->team}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
