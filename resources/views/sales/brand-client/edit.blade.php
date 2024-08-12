@extends('sales.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Brand / Client</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Brand / Klien</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sales.brand-client.update', $brandClient->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>PIC NTV</label>
                                    <input type="text" class="form-control" name="pic_ntv" value="{{$brandClient->pic_ntv}}">
                                </div>
                                <label>Brand/Client</label>
                                <div class="form-group">
                                    <label>Jenis Industri</label>
                                    <input type="text" class="form-control" name="jenis_industri" value="{{$brandClient->jenis_industri}}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input type="text" class="form-control" name="nama_brand" value="{{$brandClient->nama_brand}}">
                                </div>
                                <label>PIC</label>
                                <div class="form-group">
                                    <label>PIC Nama</label>
                                    <input type="text" class="form-control" name="pic_brand_nama" value="{{$brandClient->pic_brand_nama}}">
                                </div>
                                <div class="form-group">
                                    <label>PIC Jabatan</label>
                                    <input type="text" class="form-control" name="pic_brand_jabatan" value="{{$brandClient->pic_brand_jabatan}}">
                                </div>
                                <div class="form-group">
                                    <label>PIC No. Telepon</label>
                                    <input type="text" class="form-control" name="pic_brand_telepon" value="{{$brandClient->pic_brand_telepon}}">
                                </div>
                                <div class="form-group">
                                    <label>Proyeksi Revenue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="proyeksi_revenue" value="{{$brandClient->proyeksi_revenue}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Proyeksi Revenue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="realisasi_revenue" value="{{$brandClient->realisasi_revenue}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="{{$brandClient->keterangan}}">
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
