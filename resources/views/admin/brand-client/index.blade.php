@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pembagian Brand/Klien yang Dikelola</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Brand / Klien</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.brand-client.create') }}" class="btn btn-primary">
                                    + Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-3">
                                <!-- Date Range Picker Input -->
                                <div class="mb-3">
                                    <input type="text" id="daterange" class="form-control" placeholder="Select Date Range">
                                </div>
                            </div>
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                var table = $('#brandclient-table').DataTable();
                // Reload the table with new date range filters
                table.ajax.url('{{ route("admin.brand-client.data") }}?start_date=' + startDate + '&end_date=' + endDate).load();
            });
        });
    </script>
@endpush
