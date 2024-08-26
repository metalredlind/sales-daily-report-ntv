@extends('manager.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Proposal dan Surat Menyurat</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Proposal & Surat</h4>
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
                var table = $('#managerproposalsurat-table').DataTable();
                // Reload the table with new date range filters
                table.ajax.url('{{ route("manager.proposal-surat.data") }}?start_date=' + startDate + '&end_date=' + endDate).load();
            });
        });
    </script>
@endpush
