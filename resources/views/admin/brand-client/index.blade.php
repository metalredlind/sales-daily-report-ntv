@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Brand / Client</h1>
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
                      <th>Target</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td><a href="#" id="modal-1">Manager 1</a></td>
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
                        <a href="#" class="btn btn-dark"><i class="fa fa-eye"></i></a>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection