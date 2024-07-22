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
                <h4>Daily Report</h4>
                <div class="card-header-action">
                  <a href="{{route('admin.daily-report.create')}}" class="btn btn-primary">
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
                      <th>Waktu</th>
                      <th>Tim Bertugas</th>
                      <th>Nama Brand/Klien</th>
                      <th>Jenis Kegiatan</th>
                      <th>Follow Up</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        7-4-2024, 08:00
                      </td>
                      <td c lass="align-middle">
                        Tim I
                      </td>
                      <td>
                        Brand 1
                      </td>
                      <td>
                        Bahas I
                      </td>
                      <td><div class="badge badge-success">Deal</div></td>
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
  
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Brand/Klien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection