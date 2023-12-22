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
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($data_barang as $row)
                                    <tr>
                                        <td> {{ $no++ }} </td>
                                        <td> {{ $row->nama_barang}} </td>
                                        <td> {{ $row->nama_jenis}} </td>
                                        <td> {{ $row->stok}} </td>
                                        <td> {{ number_format($row->harga)}} </td>
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary" class="fa fa-edit">Edit</a>
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger" class="fa fa-trash">Hapus</a>
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
                <h5 class="modal-title">Create {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/barang/store" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang..." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="id_jenis" class="form-control" required>
                            <option value="" hidden>-- Pilih Jenis Barang --</option>
                            @foreach($data_jenis as $jenis_barang)
                            <option value="{{$jenis_barang->id}}">{{$jenis_barang->nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="stok" placeholder="Stok..." required>
                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="harga" class="form-control" placeholder="Harga...">
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

@foreach($data_barang as $d)
<div class="modal fade bd-example-modal-lg" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $title }} </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/barang/update/{{$d->id}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{{$d->nama_barang}}" placeholder="Nama Barang..." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="id_jenis" class="form-control">
                            <option value="{{$d->id_jenis}}">{{$d->nama_jenis}}</option>
                            @foreach($data_jenis as $jenis_barang)
                            <option value="{{$jenis_barang->id}}">{{$jenis_barang->nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="stok" value="{{$d->stok}}" placeholder="Stok..." required>
                        <div class="input-group-append"><span class="input-group-text">Pcs</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" name="harga" class="form-control" value="{{$d->harga}}" placeholder="Harga...">
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

@foreach($data_barang as $c)
<div class="modal fade bd-example-modal-lg" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{ $title }} </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/barang/hapus/{{ $d->id }}" method="get">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah anda ingin menghapus data ini</h5>
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