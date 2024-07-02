@extends('layouts.template')
@section('judulh1','Admin - tambah priode')

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
            <h3 class="card-title">Tambah Data priode</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('priode.store',$id_peternakan) }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="id_peternakan">peternakan</label>
                    <input type="text" class="form-control" id="id_peternakan" name="id_peternakan" placeholder="" value="{{$id_peternakan}}">
                </div>
                <div class="form-group">
                    <label for="tgl_mulai">tanggal mulai Peternakan</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="">
                </div>
                <div class="form-group">
                    <label for="tgl_akhir">tanggal akhir</label>
                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                </div>


                <div class="form-group">
                    {{-- <label for="aktif">aktif</label>
                    <input type="text" class="form-control" id="aktif" name="aktif"> --}}
                    <label for="aktif">aktif</label><br>
                     <input type="radio" name="aktif" value="on"/><b>on</b>
                     <input type="radio" name="aktif" value="of"/><b>off</b>
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
