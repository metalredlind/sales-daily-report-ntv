@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Manage User</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update User</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.manage-user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" name="name" value="{{$user->name}}">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="{{$user->email}}">
                      </div>
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$user->title}}">
                      </div>
                      <div class="form-group">
                          <label for="inputState">Role</label>
                          <select id="inputState" class="form-control" name="role">
                              <option value="">Select</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="sales">Sales</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Tim</label>
                        <input type="text" class="form-control" name="team" value="{{$user->team}}">
                      </div>
                      <button type="submmit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                  <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate="" action="{{ route('admin.manage-user.update-password', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Password Baru</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Konfirmasi Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
