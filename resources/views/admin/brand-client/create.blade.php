@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Brand / Client</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Brand / Klien</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label>PIC NTV</label>
                                    <input type="text" class="form-control">
                                </div>
                                <label>Brand/Client</label>
                                <div class="form-group">
                                    <label>Jenis Industri</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input type="text" class="form-control">
                                </div>
                                <label>PIC</label>
                                <div class="form-group">
                                    <label>PIC Nama</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>PIC Jabatan</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>PIC No. Telepon</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Proyeksi Revenue</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          Rp
                                        </div>
                                      </div>
                                      <input type="text" class="form-control currency">
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
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
