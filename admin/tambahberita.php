<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id					= $_POST['id'];
			$gambarname			= $_FILES['gambar']['name'];
			$gambartmp			= $_FILES['gambar']['tmp_name'];
			$judul				= $_POST['judul'];
			$uraian				= $_POST['uraian'];
			$id_kategori			= $_POST['id_kategori'];

			// $uraian = $_POST['uraian'];
			// 	if (strlen($uraian) !=150) {
			// 		echo "succes";
			// 	}
			// 	else{
			// 		echo "Jumlah karakter melebihi 150.";
			// 	}

			$cek = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$namafile = uniqid()."_".$gambarname;
				$pindah = move_uploaded_file($gambartmp,"./assets/upload_gambar/berita/".$namafile);
				if ($pindah){
				$sql = mysqli_query($koneksi, "INSERT INTO berita(id, gambar, judul, uraian,id_kategori) VALUES('$id', '$namafile', '$judul', '$uraian', '$id_kategori')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="dashbord.php?page=tampil_berita";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

<!-- <script language=JavaScript>
function check_length(my_form)
{
maxLen = 150; // max number of characters input
if (my_form.my_text.value.length >= maxLen) {
// Alert message if maximum limit is reached. 
// If required Alert can be removed. 
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
	my_form.my_text.value = my_form.my_text.value.substring(0, maxLen);
 }
else{ // Maximum length not reached so update the value of my_text counter
	my_form.text_num.value = maxLen - my_form.my_text.value.length;
}
}
</script> -->

		<form action="dashbord.php?page=tambah_berita" method="post" enctype="multipart/form-data">

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">judul</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="judul" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">uraian</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="uraian" class="form-control" maxlength = 200 style="height:100px;" required>
				</div>
			</div>

			<!-- <textarea onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); 
 			name=uraian rows=4 cols=30></textarea>
    		<br>                         
			<input size=1 name="uraian" class="form-control" value = 150 required> Characters Left -->
			

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">gambar</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambar" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">kategori</label>
				<div class="col-md-6 col-sm-6">
					<select type="text" name="id_kategori" class="form-control" placeholder="id_kategori " required>
						<?php
						$qry = $koneksi->query("SELECT * FROM kategori");
						while($kategori = $qry->fetch_assoc()){?>
							<option value="<?= $kategori['id_kategori'];?>"><?= $kategori['nama_kategori'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
			<input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-danger btn-sm" />
		</form>
	</div>
