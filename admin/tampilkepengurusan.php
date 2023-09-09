<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">kepengurusan website</font></center>
		<hr>
		<a href="dashbord.php?page=tambah_kepengurusan"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No</th>
					<th>id</th>
					<th>nama</th>
					<th>jabatan</th>
					<th>keterangan</th>
					<th>gambar</th> 
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM kepengurusan ORDER BY id ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['id'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['jabatan'].'</td>
							<td>'.$data['keterangan'].'</td>
							<td>'.$data['gambar'].'</td>
							<td>
							<a href="dashbord.php?page=edit_kepengurusan&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
							<a href="deletekepengurusan.php?id='.$data['id'].'&gambar='.$data['gambar'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
