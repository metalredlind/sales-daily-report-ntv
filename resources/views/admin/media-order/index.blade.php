@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>List Deal Media Order</h1>
    </div>

    <div class="section-body">
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Media Order</h4>
                <div class="card-header-action">
                  <a href="{{route('admin.media-order.create')}}" class="btn btn-primary">
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
                      <th>Tanggal Input</th>
                      <th>Client</th>
                      <th>No. Paket</th>
                      <th>Tanggal Paket</th>
                      <th>Nominal Paket</th>
                      <th>Jenis Paket</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                      7-1-2024
                      </td>
                      <td>
                        Si Eta
                      </td>
                      <td c lass="align-middle">
                        1
                      </td>
                      <td>
                      7-24-2024
                      </td>
                      <td>
                      Rp.20.000.000
                      </td>
                      <td>Fisik?</td>
                      <td>
                        <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
        <td colspan="5" class="text-right"><strong>Total Nominal:</strong></td>
        <td><strong id="total-nominal">Rp. 20.000.000</strong></td>
      </tr>
    </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</div>

@endsection