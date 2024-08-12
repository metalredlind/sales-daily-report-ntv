@extends('sales.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Proposal dan Surat Menyurat</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Proposal dan Surat Menyurat</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sales.proposal-surat.update', $proposalSurat->id) }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>No. Surat/MO/Proposal</label>
                                    <input type="text" class="form-control" name="no_surat" value="{{$proposalSurat->no_surat}}">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan Surat</label>
                                    <input type="text" class="form-control" name="tujuan_surat" value="{{$proposalSurat->tujuan_surat}}">
                                </div>
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <input type="text" class="form-control" name="perihal" value="{{$proposalSurat->perihal}}">
                                </div>
                                <div class="form-group">
                                    <label>Status Follow Up</label>
                                    <select id="inputState" class="form-control wsus__input" name="status_follow_up">
                                        <option value="" class="disabled">Pilih</option>
                                        <option {{$proposalSurat->status_follow_up == 0 ? 'selected': ''}} value="0">Belum Dikirim</option>
                                        <option {{$proposalSurat->status_follow_up == 1 ? 'selected': ''}} value="1">Sudah Dikirim</option>
                                    </select>
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
