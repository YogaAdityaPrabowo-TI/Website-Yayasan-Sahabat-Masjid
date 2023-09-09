<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id='$id'") or die(mysqli_error($koneksi));
			// $select = mysqli_query($koneksi, "SELECT * FROM banner WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){

			$gambar			= $_FILES['gambar']['name'];
			$tmpgambar		= $_FILES['gambar']['tmp_name'];
			$gambar_lama	= $_POST['gambar_lama'];
			$namafile = uniqid()."_".$gambar;
			$pindah = move_uploaded_file($tmpgambar,"./assets/upload_gambar/galeri/".$namafile);
			if($pindah){
			@unlink("./assets/upload_gambar/galeri/".$gambar_lama);
			$sql = mysqli_query($koneksi, "UPDATE galeri SET gambar='$namafile ' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="dashbord.php?page=tampil_galeri";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
	}
		?>

		<form action="editgaleri.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
				<img style="width: 120px;" src="./assets/upload_gambar/galeri/<?php echo $data['gambar'];?>">
				<div class="col-md-6 col-sm-6">
				<input type="text" name="gambar_lama" class="form-control" value="<?php echo $data['gambar']; ?>" hidden>
					<input type="file" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="dashbord.php?page=tampil_galeri" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
