<body>

    <!-- ======= Header ======= -->
    <header id="header1" class="header1 fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/Logo_AstraLearn.png') }}" alt="">
            </a>
        </div><!-- End Logo -->

        <nav class="header1-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="CaraBelajar" style="color: #006CBB; font-weight: 500;">Cara Belajar</a></li>
                <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="Kelas" style="color: #006CBB; font-weight: 500;">Kelas</a></li>
                <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="CaraDapatSertifikat" style="color: #006CBB; font-weight: 500;">Cara Dapat Sertifikat</a></li>

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                <li class="nav-item d-flex align-items-center">
                        <a href="Login" class="btn btn-primary" style="background-color: #006CBB; border-radius: 15px;margin-right: 5px; width: 70px; height: 40px;">Login</a>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header>

    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex justify-cntent-center align-items-center" style="background-image: url(../assets/img/beranda.jpg); border-radius: 15px; margin-bottom: 40px; margin-top: 140px; margin-right: 40px; margin-left: 40px; width: 1445px;">
            <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown" style="font-size: 70px;">Selamat Datang di <span>AstraLearn</span></h2>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown" style="font-size: 70px;">Mari Belajar bersama AstraLearn</h2>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown" style="font-size: 70px;">Belajar dengan Pengalaman yang Berbeda</h2>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </section><!-- End Hero -->
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Bootstrap CSS -->
<!-- Swipper JS -->
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

<!-- JavaScript -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
</body>

</html>
