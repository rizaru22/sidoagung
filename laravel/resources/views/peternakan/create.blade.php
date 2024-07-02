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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data peternakan1</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('peternakan.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Peternakan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>


                <div class="form-group">
                    <label for="noHp">no Hp</label>
                    <input type="text" class="form-control" id="noHp" name="noHp">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
