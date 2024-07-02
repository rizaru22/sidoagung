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
        <form action="{{ route('pbbh.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="umur">umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="">
                </div>
                <div class="form-group">
                    <label for="pbbh">pbbh</label>
                    <input type="number" class="form-control" id="pbbh" name="pbbh">
                </div>


                <div class="form-group">
                    <label for="eph">ephe</label>
                    <input type="number" class="form-control" id="eph" name="eph">
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
