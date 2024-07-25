@extends('admin.layouts.master')

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
                  <a href="{{route('admin.proposal-surat.create')}}" class="btn btn-primary">
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
                      <th>Tanggal</th>
                      <th>No. Surat/MO/Proposal</th>
                      <th>Tujuan Surat</th>
                      <th>Perihal</th>
                      <th>Status Follow Up</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        7-4-2024
                      </td>
                      <td c lass="align-middle">
                        123-45678-90
                      </td>
                      <td>
                        Proposal
                      </td>
                      <td>
                        Perihal I
                      </td>
                      <td><div class="badge badge-danger">Belum Dikirim</div></td>
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

@endsection