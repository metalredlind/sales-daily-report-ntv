@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create New Daily Report</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daily Report</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.daily-report.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Waktu Tanggal dan Jam</label>
                                    <input type="text" class="form-control datetimepicker" name="waktu" value="{{old('waktu')}}">
                                  </div>
                                <div class="form-group">
                                    <label>Nama Tim yang Bertugas</label>
                                    <input type="text" class="form-control" name="tim_bertugas" value="{{old('tim_bertugas')}}">
                                </div>
                                <label>Tujuan Klien/Brand</label>
                                <div class="form-group">
                                    <label>Nama Klien</label>
                                    <select class="form-control" name="nama_klien" id="nama_klien">
                                        <option value="">Pilih Nama Klien</option>
                                        @foreach($brand_clients as $client)
                                            <option value="{{ $client->id }}" 
                                                data-jabatan="{{ $client->pic_brand_jabatan }}" 
                                                data-telepon="{{ $client->pic_brand_telepon }}">
                                                {{ $client->nama_brand }}
                                            </option>
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <label>Jabatan Klien</label>
                                    <input type="text" class="form-control" name="brand_jabatan_klien" value="{{old('pic_brand_jabatan')}}">
                                </div>
                                <div class="form-group">
                                    <label>No. Telp Klien</label>
                                    <input type="text" class="form-control" name="nomor_telepon" value="{{old('nomor_telepon')}}">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Pertemuan</label>
                                    <input type="text" class="form-control" name="lokasi_pertemuan" value="{{old('lokasi_pertemuan')}}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kegiatan (Pembahasan)</label>
                                    <input type="text" class="form-control" name="jenis_kegiatan" value="{{old('jenis_kegiatan')}}">
                                </div>
                                <div class="form-group">
                                    <label>Follow Up Lanjutan</label>
                                    <input type="text" class="form-control" name="follow_up" value="{{old('follow_up')}}">
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

<script>
    document.getElementById('nama_klien').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('brand_jabatan_klien').value = selectedOption.getAttribute('data-jabatan');
        document.getElementById('nomor_telepon').value = selectedOption.getAttribute('data-telepon');
    });
</script>