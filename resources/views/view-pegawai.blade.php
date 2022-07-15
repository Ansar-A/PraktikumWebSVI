@extends('layouts.index')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">View Pegawai</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">View Pegawai</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-gray">
					<div class="card-header">
						<h3 class="card-title">FORM <small>View Pegawai</h3>
					</div>
					<form method="POST" action="/pegawai" role="form" id="quickForm">
						@csrf
						<div class="card-body">
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">NIP</label>
								<div class="col-sm-10">
									<label class="form-control">{{ $pegawai->nip }}</label>
								</div>
							</div>

							<!-- Praktikum7 -->
							<div class="form-group row">
								<label for="cover_image" class="col-sm-2 col-form-label">Gambar Sampul</label>
								<div class="col-sm-10">
									<img src="{{ Storage::url("{$pegawai->cover_img}") }}" alt="User Avatar" class="img-size-64 mr-xl-3">
								</div>
							</div>
							<div class="form-group row">
								<label for="filepdf" class="col-sm-2 col-form-label">File PDF</label>
								<div class="col-sm-10">
									<a target="_blank" href="{{ Storage::url($pegawai->filepdf)}}">lihat File</a>
								</div>
							</div>
							<!-- Praktikum7 -->
							<div class="form-group row">
								<label for="nama" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<label class="form-control">{{ $pegawai->nama }}</label>
								</div>
							</div>
							<div class="form-group row">
								<label for="ttglahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-10">
									<label class="form-control">{{ $pegawai->ttglahir }}</label>
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-sm-2 col-form-label">Agama</label>
								<div class="col-sm-10">
									<label class="form-control">{{ $pegawai->agama }}</label>
								</div>
							</div>
							<div class="form-group row">
								<label for="jkelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-10">
									<label class="form-control">{{ $pegawai->jkelamin }}</label>
								</div>
							</div>
						</div>
						<!-- <div class="card-footer">
                        <button type="button" onclick="window.location='{{ url("pegawai") }}'" class="btn btn-default float-right">List Pegawai >></button>
    
                    </div> -->
					</form>
				</div>
			</div>
			<div class="col-md-6">

			</div>

		</div>
	</div>
</div>

@endsection

@section('script')

<script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#quickForm').validate({
			rules: {
				isbn: {
					required: true,
				},
				judul: {
					required: true,
				},
				author: {
					required: true,
				},
				tahun: {
					required: true,
				},
			},
			messages: {
				isbn: {
					required: "ISBN Wajib Diisi"
				},
				judul: {
					required: "Judul Wajib Diisi"
				},
				author: {
					required: "Author Wajib Diisi"
				},
				tahun: {
					required: "Tahun Wajib Diisi"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid')
			},
			highlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid')
			}
		});
	});
</script>
<script>
	$('[isbn-mask]').inputmask()
	$('[tahun-mask]').inputmask()
</script>
@endsection