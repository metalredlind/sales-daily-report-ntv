@extends('sales.layouts.master')

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
                            <form action="{{ route('sales.brand-client.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>PIC NTV</label>
                                    <select class="form-control" name="pic_ntv_id">
                                        <option value="">Select PIC NTV</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('pic_ntv_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Brand/Client</label>
                                <div class="form-group">
                                    <label>Jenis Industri</label>
                                    <input type="text" class="form-control" name="jenis_industri" value="{{old('jenis_industri')}}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input type="text" class="form-control" name="nama_brand" value="{{old('nama_brand')}}">
                                </div>
                                <label>PIC Client</label>
                                <div class="form-group">
                                    <label>PIC Nama Client</label>
                                    <input type="text" class="form-control" name="pic_brand_nama" value="{{old('pic_brand_nama')}}">
                                </div>
                                <div class="form-group">
                                    <label>PIC Jabatan Client</label>
                                    <input type="text" class="form-control" name="pic_brand_jabatan" value="{{old('pic_brand_jabatan')}}">
                                </div>
                                <div class="form-group">
                                    <label>PIC No. Telepon Client</label>
                                    <input type="text" class="form-control" name="pic_brand_telepon" value="{{old('pic_brand_telepon')}}">
                                </div>
                                <div class="form-group">
                                    <label>Proyeksi Revenue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="numeric" class="form-control" name="proyeksi_revenue" value="{{old('proyeksi_revenue')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Realisasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="numeric" disabled class="form-control" name="realisasi_revenue" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="{{old('keterangan')}}">
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
