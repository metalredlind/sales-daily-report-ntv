@extends('manager.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create New Daily Report</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daily Report</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sales.daily-report.update', $dailyReport->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Waktu Tanggal dan Jam</label>
                                    <input type="text" class="form-control datetimepicker" name="waktu" value="{{$dailyReport->waktu}}">
                                  </div>
                                <div class="form-group">
                                    <label>Nama Tim yang Bertugas</label>
                                    <input type="text" class="form-control" name="tim_bertugas" value="{{$dailyReport->tim_bertugas}}">
                                </div>
                                <label>Tujuan Klien/Brand</label>
                                <div class="form-group">
                                    <label>Nama Brand/Klien</label>
                                    <input type="text" class="form-control" name="nama_brand_klien" value="{{$dailyReport->nama_brand_klien}}">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Pertemuan</label>
                                    <input type="text" class="form-control" name="lokasi_pertemuan" value="{{$dailyReport->lokasi_pertemuan}}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Klien</label>
                                    <input type="text" class="form-control" name="nama_klien" value="{{$dailyReport->nama_klien}}">
                                </div>
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="text" class="form-control" name="nomor_telepon" value="{{$dailyReport->nomor_telepon}}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan (Pembahasan)</label>
                                    <input type="text" class="form-control" name="jenis_kegiatan" value="{{$dailyReport->jenis_kegiatan}}">
                                </div>
                                <div class="form-group">
                                    <label>Follow Up Lanjutan</label>
                                    <input type="text" class="form-control" name="follow_up" value="{{$dailyReport->follow_up}}">
                                </div>
                                
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
