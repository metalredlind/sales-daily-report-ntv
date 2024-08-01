@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Deal Media Order</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Deal Media Order</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.media-order.update', $mediaOrder->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Klien</label>
                                    <input type="text" class="form-control" name="klien" value="{{$mediaOrder->klien}}"">
                                </div>
                                <div class="form-group">
                                    <label>No. Paket</label>
                                    <input type="text" class="form-control" name="nomor_paket" value="{{$mediaOrder->nomor_paket}}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Paket</label>
                                    <input type="text" class="form-control datepicker" name="tanggal_paket" value="{{$mediaOrder->tanggal_paket}}">
                                </div>
                                <div class="form-group">
                                    <label>Nominal Paket</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="nominal_paket" value="{{$mediaOrder->nominal_paket}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Paket</label>
                                    <input type="text" class="form-control" name="jenis_paket" value="{{$mediaOrder->jenis_paket}}">
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
