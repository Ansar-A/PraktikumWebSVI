@extends('layouts.index')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Pegawai</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Edit Pegawai</li>
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
						<h3 class="card-title">FORM <small>Edit Data Pegawai</h3>
					</div>
					<form method="POST" action="/pegawai/{{ $pegawai->nip }}" role="form" id="quickForm" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" class="form-control" id="nip" name="nip" data-inputmask='"mask": "999999999999999999"' nip-mask placeholder="Enter NIP" value="{{ $pegawai->nip }}">
							</div>
							
							<!-- Praktikum7 -->
							<div class="form-group">
								<label class="customFile">Gambar Sampul:</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="cover_img" id="cover_img">
									<label class="custom-file-label" for="customFile">Pilih Gambar</label>
								</div>
							</div>
							<div class="form-group">
								<label class="customFile">File PDF:</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="filepdf" id="filepdf">
									<label class="custom-file-label" for="customFile">Pilih File</label>
								</div>
							</div>
							<!-- Praktikum7 -->

							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" value="{{ $pegawai->nama }}">
							</div>
							<div class="form-group">
								<label for="ttglahir">Tanggal Lahir</label>
								<input type="text" class="form-control" id="ttglahir" name="ttglahir" placeholder="Enter Tanggal Lahir" value="{{ $pegawai->ttglahir }}">
							</div>
							<div class="form-group">
								<label for="agama">Agama</label>
								<input type="text" class="form-control" id="agama" name="agama" placeholder="Enter Agama" value="{{ $pegawai->agama }}">
							</div>
							<div class="form-group">
								<label for="jkelamin">Jenis Kelamin</label>
								<input type="text" class="form-control" id="jkelamin" name="jkelamin" placeholder="Enter Jenis Kelamin" value="{{ $pegawai->jkelamin }}">
							</div>
						</div>
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
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

<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		bsCustomFileInput.init();
		$('#quickForm').validate({
			rules: {
				isbn: {
					required: true,
				},
				cover_img: {
					required: true,
					accept: "image/jpeg, image/jpg, image/png",
					maxlegth: 24
				},
				filepdf: {
					required: true,
					accept: "application/pdf",
					maxlegth: 24
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
				cover_img: {
					required: "file gambar wajib diisi",
					accept: "format file harus jpeg, jpg, png",
					maxlegth: "maksimal nama file 20 karekter"
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
	$('[nip-mask]').inputmask()
</script>

@endsection