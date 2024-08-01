@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Kegiatan Harian Tim Sales</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daily Report</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.daily-report.create') }}" class="btn btn-primary">
                                    + Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Client Laporan Kegiatan Harian Tim Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="lokasiPertemuan">Lokasi Pertemuan</label>
                            <input type="text" class="form-control" id="lokasiPertemuan" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namaClient">Nama Client</label>
                            <input type="text" class="form-control" id="namaClient" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telpClient">No. Telp</label>
                            <input type="text" class="form-control" id="telpClient" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush