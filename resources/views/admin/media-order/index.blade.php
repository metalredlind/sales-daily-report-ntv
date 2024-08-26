@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Paket</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Paket</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.media-order.create') }}" class="btn btn-primary">
                                    + Add New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-6">
                                <!-- Date Range Picker Input -->
                                <div class="mb-3">
                                    <input type="text" id="daterange" class="form-control"
                                        placeholder="Select Date Range">
                                </div>
                            </div>
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                var table = $('#mediaorder-table').DataTable();
                // Reload the table with new date range filters
                table.ajax.url('{{ route("admin.media-order.data") }}?start_date=' + startDate + '&end_date=' + endDate).load();
            });
        });
    </script>
@endpush