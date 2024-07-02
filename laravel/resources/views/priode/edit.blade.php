@extends('layouts.template')
@section('judulh1','Admin - Peternakan')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Priode</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('priode.update', $priode->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="aktif">Aktif</label><br>
                    <input type="radio" name="aktif" value="on" {{ $priode->aktif == 'on' ? 'checked' : '' }}><b>On</b>
                    <input type="radio" name="aktif" value="of" {{ $priode->aktif == 'of' ? 'checked' : '' }}><b>Off</b>
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
