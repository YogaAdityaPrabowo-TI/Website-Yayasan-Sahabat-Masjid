<?php
include './admin/config.php';
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
    <link rel="icon" href="images/logoyayasan.jpeg" type="image/ico" />
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
          <a href="beritautama.php" class="nav-link">Berita</a>
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
    
    <div class="container">
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
            <img src="images/logoyayasan.jpeg">
            <p class="banner-paragraph">Yayasan Sahabat Masjid</p>
          </div>
        </div>
      </section>
      <!-- End of Section 1 -->

      <!-- Section 3 -->
      <section class="kepengurusan" id="kepengurusan">
        <div>
          <h1 class="section-heading">Kepengurusan</h1>
        </div>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM kepengurusan ORDER BY id ");
        while($rw = mysqli_fetch_array($query)){
        ?>
        <section class="team">
          <main class = "grid">
          <div class="cards-wrapper">
            <div class="card" data-tilt>
              <div class="card-img-wrapper">
                <img src="./admin/assets/upload_gambar/kepengurusan/<?= $rw['gambar']?>" width="300px" height="300px" />
              </div>
              <div class="card-info">
                <h2><?= $rw['nama']?></h2>
                <h3><?= $rw['jabatan']?></h3>
                <p>
                <?= $rw['keterangan']?>
                </p>
              </div>
            </div>
          </div>
        </main>
        </section>
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
</body>
</html>