<?php
$sumber = 'http://aset.sahabatmesjid.com/api/AsetUangMasukBaca.php';
$konten = file_get_contents($sumber);
$data = json_decode($konten,true);
//var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aset Uang Masuk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body{
        background: url(images/fixbackgrond.jpg) no-repeat;
    }
    h1 {
      text-align: center;
    }
  </style>
</head>
  <body>
    <h1>Aset Uang Masuk</h1>
    <br>
    <div class="container mt-3">
        <div class="row">
          <?php foreach ($data['result'] as $row){

          ?>
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Nama Donatur</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['nominal']?></td>
                        <td><?php echo $row['tanggal']?></td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['namadonatur']; ?></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <?php }?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    -->
  </body>
</html>