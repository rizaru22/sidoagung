@extends('layouts.template')
@section('tambahanCSS')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection

@section('judulh1', 'Admin - Laporan')

@section('konten')
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h2 class="card-title">Data Laporan</h2>
                <a type="button" class="btn btn-success float-right" href="{{ url('export-laporan') }}">
                   <i class="fas fa-file-excel"></i> Export to Excel
                </a>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Petugas ID</th>
                            <th>MDD CI</th>
                            <th>priode peternakan</th>
                            <th>Tgl CI</th>
                            <th>Pop E</th>
                            <th>BW DOC</th>
                            <th>DOC</th>
                            <th>Jenis Pakan</th>
                            <th>TKP Sak</th>
                            <th>SP Sak</th>
                            <th>Terpakai</th>
                            <th>Umur</th>
                            <th>Mor E</th>
                            <th>Mor</th>
                            <th>Ayam Hidup</th>
                            <th>BW</th>
                            <th>FI</th>
                            <th>Act FCR</th>
                            <th>Std FCR</th>
                            <th>Dif</th>
                            <th>PBBH</th>
                            <th>Std PBBH</th>
                            <th>Progres</th>
                            <th>EP</th>
                            <th>Std EPH</th>
                            <th>Progres2</th>
                            <th>Suhu</th>
                            <th>RH</th>
                            <th>HI</th>
                            <th>Kepadatan</th>
                            <th>TRA</th>
                            <th>TMA</th>
                            <th>Treatment OVK</th>
                            <th>Kondisi</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->petugas_id }}</td>
                                <td>{{ $dt->mdd_ci }}</td>
                                <td>{{ $dt->priode_id }}</td>
                                <td>{{ $dt->tgl_ci }}</td>
                                <td>{{ $dt->pop_e }}</td>
                                <td>{{ $dt->bw_doc }}</td>
                                <td>{{ $dt->doc }}</td>
                                <td>{{ $dt->jenis_pakan }}</td>
                                <td>{{ $dt->tkp_sak }}</td>
                                <td>{{ $dt->sp_sak }}</td>
                                <td>{{ $dt->terpakai }}</td>
                                <td>{{ $dt->umur }}</td>
                                <td>{{ $dt->mor_e }}</td>
                                <td>{{ $dt->mor }}</td>
                                <td>{{ $dt->ayam_hidup }}</td>
                                <td>{{ $dt->bw }}</td>
                                <td>{{ $dt->fi }}</td>
                                <td>{{ $dt->act_fcr }}</td>
                                <td>{{ $dt->std_fcr }}</td>
                                <td>{{ $dt->dif }}</td>
                                <td>{{ $dt->pbbh }}</td>
                                <td>{{ $dt->std_pbbh }}</td>
                                <td>{{ $dt->progres }}</td>
                                <td>{{ $dt->ep }}</td>
                                <td>{{ $dt->std_eph }}</td>
                                <td>{{ $dt->progres2 }}</td>
                                <td>{{ $dt->suhu }}</td>
                                <td>{{ $dt->rh }}</td>
                                <td>{{ $dt->hi }}</td>
                                <td>{{ $dt->kepadatan }}</td>
                                <td>{{ $dt->tra }}</td>
                                <td>{{ $dt->tma }}</td>
                                <td>{{ $dt->treatment_ovk }}</td>
                                <td>{{ $dt->kondisi }}</td>
                                <td>{{ $dt->saran }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-warning" href="{{ route('laporan.edit', $dt->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('laporan.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('tambahanJS')
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

@section('tambahScript')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "responsive": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        @if ($message = Session::get('success'))
            toastr.success("{{ $message }}");
        @elseif ($message = Session::get('updated'))
            toastr.warning("{{ $message }}");
        @elseif ($message = Session::get('deleted'))
            toastr.error("{{ $message }}");
        @endif
    </script>
@endsection
