@extends('layout/layout')

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title"> {{ $title }} </h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($data_user as $user)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $user->name}} </td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->role}}</td>
                                        <td>
                                            <a href="#modalEdit{{ $user->id }}" data-toggle="modal" class="btn btn-xs btn-primary" class="fa fa-edit">Edit</a>
                                            <a href="#modalHapus{{ $user->id }}" data-toggle="modal" class="btn btn-xs btn-danger" class="fa fa-trash">Hapus</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>



<div class="modal fade bd-example-modal-lg" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/store" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password..." required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

@foreach($data_user as $d)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/update/{{$d->id}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }} " class="form-control" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password..." required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option <?php if ($d['role'] == "admin") echo "selected"; ?>>Admin</option>
                            <option <?php if ($d['role'] == "kasir") echo "selected"; ?>>Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endforeach

@foreach($data_user as $c)
<div class="modal fade bd-example-modal-lg" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/hapus/{{ $d->id }}" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah anda ingin menghapus data ini</h5>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{ $d->email }} " class="form-control" name="email" placeholder="Email..." disabled>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password..." disabled>
                    </div>
                    <div class="form-group">
                        <label><?php $c['role'] ?></label>
                        <select name="role" class="form-control" disabled>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option <?php if ($d['role'] == "admin") echo "selected"; ?>>Admin</option>
                            <option <?php if ($d['role'] == "kasir") echo "selected"; ?>>Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash">Hapus</i></button>
                </div>
            </form>

        </div>
    </div>
</div>
@endforeach

@endsection