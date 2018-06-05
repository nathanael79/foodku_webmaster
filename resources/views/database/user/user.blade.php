@extends('adminlte::page')

@section('title', 'User List Webmaster')

@section('content')
<div class="content">
	<section class="content-header">
		<h1>
			Ubah Data<br>
			<small style="padding-left: 0">Ubah data barang baru ke dalam asset yang anda miliki</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?= url('dashboard')?>">
					<i class="fa fa-dashboard"></i> Dashboard
				</a>
			</li>
			<li>
				<a href="<?= url('barang')?>">
					<i class="fa fa-building"></i> Barang
				</a>
			</li>
			<li><i class="fa fa-plus"></i>&nbsp; Ubah data</li>
		</ol>
	</section>

	<section class="content container-fluid main-content-container">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary box-centered">
					<div class="box-header with-border">
						<h3 class="box-title"><b>Ubah data Barang</b></h3>
					</div>
					<div class="box-body">
						<form class="form-main form-update" action="" method="POST">
							<div class="form-group">
								<label for="barang">Nama Barang</label>
								<input type="text" class="form-control" name="barang" id="barang" placeholder="Masukan nama barang..." required value="">
								
							</div>
							<div class="form-group">
								<label for="minstock">Stock Minimal</label>
								<input type="number" class="form-control" name="minstock" id="minstock" placeholder="Masukkan stock minimal ..." min="1" value="<">
						
							</div>
							<div class="form-group">
								<label for="barcode">Barcode</label>
								<input type="text" class="form-control" name="barcode" id="barcode" placeholder="Masukkan barcode..." required value="">
								
							</div>
							<a href="" class="btn btn-lg btn-danger btn-flat"><i class="fa fa-trash-o"></i>&nbsp; Batal</a>
							<button type="submit" class="btn btn-lg btn-primary btn-flat"><i class="fa fa-save"></i>&nbsp; Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


@endsection