@extends('manager.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Paket</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Paket</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sales.media-order.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Klien</label>
                                    <input type="text" class="form-control" name="klien" value="{{old('klien')}}">
                                </div>
                                <div class="form-group">
                                    <label>No. Paket</label>
                                    <input type="text" class="form-control" name="nomor_paket" value="{{old('nomor_paket')}}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Paket</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_paket" value="{{old('tanggal_paket')}}">
                                </div>
                                <div class="form-group">
                                    <label>Nominal Paket</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="nominal_paket" value="{{old('proyeksi_revenue')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Paket</label>
                                    <input type="text" class="form-control" name="jenis_paket" value="{{old('jenis_paket')}}">
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
