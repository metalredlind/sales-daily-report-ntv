@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Target Sales</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Input Target</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Bulan Target</label>
                                    <input type="text" class="form-control datetimepicker">
                                  </div>
                                <div class="form-group">
                                    <label>Proyeksi Revenue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="proyeksi_revenue" value="{{old('proyeksi_revenue')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Realisasi (Set di 0 terlebih dahulu ketika menambahkan target)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="realisasi" value="{{old('proyeksi_revenue')}}">
                                    </div>
                                <div class="form-group">
                                    <label>Selisih/Varian (Rp)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="selisihvarian" value="{{old('proyeksi_revenue')}}" placeholder="Target - Realisasi" readonly>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Tambah</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
