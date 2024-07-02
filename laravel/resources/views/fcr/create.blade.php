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
        <form action="{{ route('fcr.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="bw">bw</label>
                    <input type="text" class="form-control" id="bw" name="bw" placeholder="">
                </div>
                <div class="form-group">
                    <label for="fcr">fcr</label>
                    <input type="text" class="form-control" id="fcr" name="fcr">
                </div>


                <div class="form-group">
                    <label for="mor">more</label>
                    <input type="text" class="form-control" id="mor" name="mor">
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
