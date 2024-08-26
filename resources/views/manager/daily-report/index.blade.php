@extends('manager.layouts.master')

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
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-6">
                                <!-- Date Range Picker Input -->
                                <label>Date Range Picker</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    </div>
                                    <input type="text" id="daterange" class="form-control daterange-cus" placeholder="Select Date Range">
                                </div>
                            </div>
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
    
    <script>
        $(document).ready(function() {
            // Initialize date range picker
            $('#daterange').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
    
            // Filter data on date range change
            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                // Adjust dates to avoid timezone issues
                let startDate = picker.startDate.clone().startOf('day').format('YYYY-MM-DD');
                let endDate = picker.endDate.clone().endOf('day').format('YYYY-MM-DD');
    
                // Get the DataTable instance
                var table = $('#managerdailyreport-table').DataTable();
                // Reload the table with new date range filters
                table.ajax.url('{{ route("manager.daily-report.data") }}?start_date=' + startDate + '&end_date=' + endDate).load();
            });
        });
    </script>
@endpush
