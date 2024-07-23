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
                            <form action="">
                                <div class="form-group">
                                    <label>Klien</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. Paket</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ranggal Paket</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominal Paket</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Paket</label>
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
