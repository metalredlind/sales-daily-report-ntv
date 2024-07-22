@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Proposal dan Surat Menyurat</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Proposal dan Surat Menyurat</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No. Surat/MO/Proposal</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan Surat</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status Follow Up</label>
                                    <select class="form-control">
                                        <option>Sudah Dikirim</option>
                                        <option>Belum Dikirim</option>
                                    </select>
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
