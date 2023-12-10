<?php

require_once('../required/database.php');
if (isset($_GET['id'])) {
    $experience_id = strip_tags(mysqli_escape_string($conn, $_GET['id']));

    $query = "SELECT * FROM experience WHERE id = {$experience_id}";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $experience = mysqli_fetch_assoc($result);

        $title = $experience['title'];
        $tools = $experience['tools'];
        $description = $experience['description'];
    } else {
        echo "Data Id Tidak Di Temukan.";
        exit();
    }
} else {
    
    echo "Id Tidak Ada";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
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
    <!-- ======= Hero Section ======= -->


    <main id="main">
        <div class="container">

            <div class="section-title">
                <h2>Experience</h2>
            </div>

            <form action="update_experience.php" method="post" >
                <!-- Your form fields go here -->
                <div class="row">
                    <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $experience_id; ?>">
                        <label for="name">title</label>
                        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title" id="title" required>
                    </div>
                    <div class="form-group ">
                        <label for="name">Tools</label>
                        <input type="text" name="tools" value="<?php echo $tools; ?>"  class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" required><?php echo $description; ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </form>


        </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


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