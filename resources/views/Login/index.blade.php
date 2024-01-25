<!DOCTYPE html>
<html lang="en">

<!--let table = new DataTable('#myTable');-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login AstraLearn</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/AstraLearn_favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/AstraLearn.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css.css">-->


  <style>
        body {
              padding-top: 70px; /* Adjust the value based on your header height */
              background-color: #C7E3F8;
            }

            .login-container {
              min-height: 100vh;
              display: flex;
              align-items: center;
              justify-content: center;
            }

            .login-container .container {
              width: 80%; /* Adjust the width of the container */
            }

            .login-container form {
                max-width: 430px; /* Adjust the maximum width of the form */
                width: 100%;
                margin: auto;
                }

  </style>
  

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    >
    <!-- ======= Header ======= -->
    <header id="header1" class="header1 fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/Logo_AstraLearn.png') }}" alt="">
            </a>
            
        </div><!-- End Logo -->

        <nav class="header1-nav ms-auto">

            <ul class="d-flex align-items-center">

            <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon"
                        href="">Cara Belajar</a></li>
                <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon"
                        href="">Kelas</a></li>
                <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon"
                        href="">Cara Dapat Sertifikat</a></li>

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item d-flex align-items-center">
                        <a href="Login" class="btn btn-primary">Login</a>
                </li>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
   
    <main>
    <div class="container-fluid ps-md-0">
      <div class="row g-0 justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="login-container fixed-top d-flex align-items-center justify-content-center py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                  <div class="d-flex py-4 flex-column align-items-center">
                    <div class="section-title text-left">
                      <span><h2>Masuk</h2></span>
                      <p>Masuk untuk mengakses kelas kamu di AstraLearn</p>
                    </div>
                    <!-- Sign In Form -->
                   <form class="row g-3 needs validation" action="{{ route('actionlogin') }}" method="post">
                    @csrf
                            <hr>
                            @if(session('error'))
                            <div class="alert-danger">
                                <b>Opps!</b> {{session('error')}}
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" required="">
                            </div>
                                <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                              Remember password 
                             </label>
                            </div>
                            <div class="d-grid">
                              <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" style="font-family:'Poppins', sans-serif;">Masuk</button>
                            </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

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

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

      </body>
</html>