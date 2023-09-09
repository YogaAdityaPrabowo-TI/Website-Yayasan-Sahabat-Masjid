<?php
include './admin/config.php';
$id_ktgr = $_GET['kategori'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YayasanSahabatMasjid</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="icon" href="images/logo.jpeg" type="image/ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .container1{
      width: 100%;
    }
    .navbar{
      position: fixed;
      top: 0;
    }
    .nav-list{
      color: white;
      font-size:35px;
    }
  </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="navbar-logo">
        <a href="#">
          <span>Y</span>ayasan<span>S</span>ahabat<span>M</span>asjid
        </a>
      </div>
      <div class="nav-list">
          <a href="index.php" class="nav-link">Home</a>
          <a href="index.php" class="nav-link">Visi Misi</a>
          <a href="kepengurusan.php" class="nav-link">Kepengurusan</a>
          <a href="index.php" class="nav-link">Berita</a>
          <a href="galeri.php" class="nav-link">Galeri</a>
          <a href="#contact" class="nav-link">Contact</a>
      </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Menu -->
    <div class="menu">
      <div class="line line-1"></div>
      <div class="line line-2"></div>
      <div class="line line-3"></div>
    </div>
    <!-- End of Menu -->
    
    <div class="container1">
      <!-- Section 1 -->
      <section class="section-1" id="home">
        <div class="banner">
          <h1 class="banner-heading">
            <span class="heading-1">Yayasan</span>
            <span class="heading-2">Sahabat</span>
            <span class="heading-3">Masjid</span>
          </h1>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <div class="banner">
            <img src="images/logo.jpeg">
            <p class="banner-paragraph">Yayasan Sahabat Masjid</p>
          </div>
        </div>
      </section>
      <!-- End of Section 1 -->

      <!-- Section 3 -->
      <section class="berita">
        <div>
          <h1 class="section-heading">Berita</h1>
        </div>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM berita where id_kategori='$id_ktgr' ");
          while($rw = mysqli_fetch_array($query)){
          ?>
          <div class="customers-wrapper">
            <div class="customer">
              <i class="fas fa-quote-left"></i>
                <h4 class="customer-name"><?= $rw['judul']?></h4>
                <p class="customer-text"><?= $rw['uraian'] ?></p>
                <img src="./admin/assets/upload_gambar/berita/<?= $rw['gambar'] ?>" class="customer-img">
                  <!-- Button trigger modal -->
                <button type="button" class="btn fourth" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $rw['id']?>">Lihat Selengkapnya...</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?php echo $rw['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php 
                      $id = $rw['id'];
                      $query1 = mysqli_query($koneksi, "SELECT * FROM berita WHERE id=$id");
                      while($row = mysqli_fetch_array($query1)){
                      ?>
                      <div class="modal-body">
                        <center>
                        <img src="./admin/assets/upload_gambar/berita/<?= $row['gambar'] ?>" style="height:250px;" class="img-fluid rounded-start" alt="..." >
                        <h5 class="card-title"><?= $row['judul']?></h5>
                        <p class="card-text"><?= $row['uraian']?></p>
                        </center>
                      <?php }?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <?php } ?>
      </section>
    <!-- End of Section 3 -->

          <!-- Section 4 -->
    <section class="section-4" id="contact">
      <h1 class="section-heading">Contact</h1>
      <div class="section-heading-line"></div>
      <div class="contact-wrapper">
        <div class="contact-details">
          <div class="phone">
            <i class="fas fa-mobile-alt"></i>
            <h3>Phone</h3>
            <p>+123 456 789</p>
            <p>+987 654 321</p>
          </div>
          <div class="address">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Address</h3>
            <p>Main street #123</p>
            <p>Wall street #123</p>
          </div>
          <div class="email">
            <i class="far fa-envelope"></i>
            <h3>Email</h3>
            <p>support@gmail.com</p>
            <p>sales@gmail.com</p>
          </div>
        </div>
        <h1>Get In Touch</h1>
        <form class="contact-form">
          <input type="text" placeholder="Your Name">
          <input type="email" placeholder="Your Email">
          <textarea placeholder="Your Message"></textarea>
          <input type="submit" value="Send Message">
        </form>
      </div>
    </section>
    <!-- End of Section 4 -->

        <!-- Footer -->
        <footer class="footer">
          <div class="footer-nav">
            <!-- <a href="#home">Home</a>
            <a href="#about-us">About Us</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a> -->
          </div>
          <p class="copyright">YayasanSahabatMasjid</p>
        </footer>
        <!-- End of Footer -->
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="script.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>