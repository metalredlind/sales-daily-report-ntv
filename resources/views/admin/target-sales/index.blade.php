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
                <h4>Target [Filter Bulan]</h4>
                <div class="card-header-action">
                  <a href="{{route('admin.target-sales.create')}}" class="btn btn-primary">
                    +  Add New
                  </a>
                </div>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Target (Rp)</th>
                      <th>Realisasi (Rp)</th>
                      <th>Selisih/Varian (Rp)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        Sales SHG
                      </td>
                      <td c lass="align-middle">
                        SHG
                      </td>
                      <td>
                        1000000000
                      </td>
                      <td>
                        50000000
                      </td>
                      <td>50000000</td>
                      <td>
                        <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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