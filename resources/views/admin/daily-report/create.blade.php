@extends('admin.layouts.master')

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
                            <form action="">
                                <div class="form-group">
                                    <label>Waktu Tanggal dan Jam</label>
                                    <input type="text" class="form-control datetimepicker">
                                  </div>
                                <div class="form-group">
                                    <label>Nama Tim yang Bertugas</label>
                                    <input type="text" class="form-control">
                                </div>
                                <label>Tujuan Klien/Brand</label>
                                <div class="form-group">
                                    <label>Nama Brand/Klien</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Pertemuan</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Klien</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan (Pembahasan)</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Follow Up Lanjutan</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
