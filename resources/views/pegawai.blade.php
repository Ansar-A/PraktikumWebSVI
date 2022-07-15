@extends('layouts.index')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Pegawai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Pegawai</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @if (!isset($pegawai) || empty($pegawai))
            <div class="col-lg-12">
                <h3 class="text-warning">Data Pegawai Kosong!</h3>
            </div>
            @else
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $pegawai)
                                <tr>
                                    <td>{{ $pegawai->nip }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->ttglahir }}</td>
                                    <td>{{ $pegawai->agama }}</td>
                                    <td>{{ $pegawai->jkelamin }}</td>

                                    <td>
                                        <a href="pegawai/{{ $pegawai->nip }}" class="text-primary">View</a>


                                        @if( Auth::user()->admin== 1):
                                        / <a href="pegawai/{{ $pegawai->nip }}/edit" class="text-warning">Edit</a>
                                        / <a href="" class="text-danger" onclick="event.preventDefault();
                                                var result = confirm('Want to Delete {{ $pegawai->nip }} : {{ $pegawai->nama }}?');
                                                if(result){
                                                    document.getElementById('logout-form-{{ $pegawai->nip }}').submit();
                                                } ">Hapus</a>
                                        <form action="pegawai/{{ $pegawai->nip }}/delete" id="logout-form-{{ $pegawai->nip }}" method="POST" style="display: none">
                                            @method('delete')
                                            @csrf
                                        </form>
                                        @endif


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- <tfoot>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection