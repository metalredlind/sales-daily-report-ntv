@extends('sales.layouts.master')

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
                            <form action="{{ route('sales.proposal-surat.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>No. Surat/MO/Proposal</label>
                                    <input type="text" class="form-control" name="no_surat" value="{{old('no_surat')}}">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan Surat</label>
                                    <input type="text" class="form-control" name="tujuan_surat" value="{{old('tujuan_surat')}}">
                                </div>
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <input type="text" class="form-control" name="perihal" value="{{old('perihal')}}">
                                </div>
                                <div class="form-group">
                                    <label>Status Follow Up</label>
                                    <select id="inputState" class="form-control wsus__input" name="status_follow_up">
                                        <option value="">Pilih</option>
                                        <option value="0">Belum Dikirim</option>
                                        <option value="1">Sudah Dikirim</option>
                                    </select>
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
