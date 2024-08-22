@extends('manager.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Target Bulanan Tim Sales</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Target
                            <!-- Year Dropdown -->
                            <select id="yearFilter" class="form-control d-inline" style="width: 100px; display: inline-block;">
                                @for ($y = date('Y') - 5; $y <= date('Y'); $y++)
                                    <option value="{{ $y }}" @if($y == date('Y')) selected @endif>{{ $y }}</option>
                                @endfor
                            </select>

                            <!-- Month Dropdown -->
                            <select id="monthFilter" class="form-control d-inline" style="width: 150px; display: inline-block;">
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" @if($m == date('m')) selected @endif>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </h4>
                        <div class="card-header-action">
                            <a href="{{ route('manager.target-sales.create') }}" class="btn btn-primary">
                                + Add New
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="targetSalesTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Team</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Target</th>
                                        <th>Realisasi</th>
                                        <th>Selisih/Varian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
        var table = $('#targetSalesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("manager.target-sales.index") }}',
                data: function(d) {
                    d.month = $('#monthFilter').val();
                    d.year = $('#yearFilter').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'tim', name: 'tim' },
                { data: 'nama', name: 'nama' },
                { data: 'jabatan', name: 'jabatan' },
                { data: 'target', name: 'target' },
                { data: 'realisasi', name: 'realisasi' },
                { data: 'selisih_varian', name: 'selisih_varian' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $('#monthFilter, #yearFilter').change(function() {
            table.ajax.reload();
        });
    });
</script>
@endpush
