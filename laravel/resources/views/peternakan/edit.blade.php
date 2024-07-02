@extends('layouts.template')
@section('judulh1','Admin - peternakan')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data peternakan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('peternakan.update',$peternakan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama peternakan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ $peternakan->nama }}">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{ $peternakan->alamat }}">
                </div>
                <div class="form-group">
                    <label for="noHp">No Telepon</label>
                    <input type="text" class="form-control" id="noHp" name="noHp" value="{{ $peternakan->noHp }}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
