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
                  <a href="{{route('admin.brand-client.create')}}" class="btn btn-primary">
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
                      <th>PIC NTV</th>
                      <th>Jenis Industry</th>
                      <th>Nama Brand</th>
                      <th>Proyeksi Revenue</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Manager 1</td>
                      <td class="align-middle">
                        Otomotif
                      </td>
                      <td>
                        Brand 1
                      </td>
                      <td>
                        Rp. 20.000.000
                      </td>
                      <td><div class="badge badge-success">Selesai</div></td>
                      <td>
                        <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PIC Brand/Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="namaPIC">Nama PIC</label>
            <input type="text" class="form-control" id="namaPIC" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="jabatanPIC">Jabatan PIC</label>
            <input type="text" class="form-control" id="jabatanPIC" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="telpPIC">No. Telp PIC</label>
            <input type="text" class="form-control" id="telpPIC" readonly="readonly">
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