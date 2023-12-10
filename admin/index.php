<?php
  session_start();
  require_once('../required/database.php');
  require_once('../required/auth.php');
  $query = "SELECT * FROM experience ORDER BY id DESC";
  $result = mysqli_query($conn, $query);
  $bukutamu = "SELECT * FROM bukutamu ORDER BY id DESC";
  $buku_tamu = mysqli_query($conn, $bukutamu);
  onlyAdmin();
  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buku tamu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->

  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
              <span>Experience</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Buku Tamu</span></a>
          </li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>User</span></a></li>
          <?php if(checkLogin()) : ?>
                <a href="../admin/index.php" class="nav-link">Admin</a>
                <a href="../logout.php" class="nav-link">Logout</a>
            <?php else: ?>
                <a href="login.php" class="nav-link">Login</a>
            <?php endif; ?>
      </ul>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->



  <main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Experience</h2>
          <a href="tambahexperience.php" class="btn btn-primary">Tambah Data</a>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Tools</th>
              <th scope="col">description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) : ?>
            <tr>
              <td><?= $no; ?></th>
              <td><?= $data['title']; ?></td>
              <td><?= $data['tools']; ?></td>
              <td><?= $data['description']; ?></td>
              <td>
                <a href="edit_experience.php?id=<?= $data['id']; ?>" class="btn btn-primary"
                  style="font-size: 10px; size: small; margin-top: 1rem;">Edit</a>
                <a href="hapus_experience.php?id=<?= $data['id']; ?>" class="btn btn-danger"
                  style="font-size: 10px; size: small; margin-top: 1rem;">Hapus</a>
              </td>
            </tr>
            <?php $no++; endwhile; ?>
          </tbody>
        </table>
      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Buku Tamu</h2>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="container">

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Pesan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
            $no = 1;
            while ($data = mysqli_fetch_array($buku_tamu)) : ?>
                <tr>
                  <td><?= $no; ?></th>
                  <td><?= $data['email']; ?></td>
                  <td><?= $data['nama']; ?></td>
                  <td><?= $data['pesan']; ?></td>
                  <td>
                    <a href="hapus_bukutamu.php?id=<?= $data['id']; ?>" class="btn btn-danger"
                      style="font-size: 10px; size: small; margin-top: 1rem;">Hapus</a>
                  </td>
                </tr>
                <?php $no++; endwhile; ?>
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.umd.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>