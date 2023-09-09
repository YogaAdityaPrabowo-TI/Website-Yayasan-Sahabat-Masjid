<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id					= $_POST['id'];
			$gambarname			= $_FILES['gambar']['name'];
			$gambartmp			= $_FILES['gambar']['tmp_name'];

			$cek = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$namafile = uniqid()."_".$gambarname;
				$pindah = move_uploaded_file($gambartmp,"./assets/upload_gambar/galeri/".$namafile);
				if ($pindah){
				$sql = mysqli_query($koneksi, "INSERT INTO galeri(id, gambar) VALUES('$id', '$namafile')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="dashbord.php?page=tampil_galeri";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="dashbord.php?page=tambah_galeri" method="post" enctype="multipart/form-data">

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">gambar</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambar" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
			<input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-danger btn-sm" />
		</form>
	</div>
