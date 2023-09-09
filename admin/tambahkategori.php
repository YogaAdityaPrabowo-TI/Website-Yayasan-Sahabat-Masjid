<?php include('config.php'); ?>

		<center><font size="6">Tambah Data Kegiatan</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id					= $_POST['id_kategori'];
			$nama_kategori		= $_POST['nama_kategori'];

			$cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				
				if ($_POST){
					$sql = mysqli_query($koneksi, "INSERT INTO kategori(id_kategori, nama_kategori) VALUES('$id', '$nama_kategori')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="dashbord.php?page=tampil_kategori";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

<form action="dashbord.php?page=tambah_kategori" method="post" enctype="multipart/form-data">


			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">nama kategori</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_kategori" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
			<input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-danger btn-sm" />
		</form>
	</div>
