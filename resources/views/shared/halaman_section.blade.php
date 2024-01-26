
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AstraLearn</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets2/img/AstraLearn_favicon.png') }}" rel="icon">
  <link href="{{ asset('assets2/img/AstraLearn.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="margin-top: 80px;">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/Logo_AstraLearn.png') }}" alt="">
        <!--<span class="d-none d-lg-block">NiceAdmin</span>-->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="CaraBelajar" style="color: #006CBB; font-weight: 500;">Cara Belajar</a></li>
        <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="Kelas" style="color: #006CBB; font-weight: 500;">Kelas</a></li>
        <li class="nav-item d-flex align-items-center"><a class="nav-link nav-icon" asp-controller="Home" asp-action="CaraDapatSertifikat" style="color: #006CBB; font-weight: 500;">Cara Dapat Sertifikat</a></li>


        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center" href="#">
            <span class="d-none d-md-block">|   Peserta </span>
            <input type="hidden" id="idLogin" value="@loggedInUserId" />
            <input type="hidden" id="namaPengguna" value="@IsLoggedIn" />
          </a><!-- End Profile Image Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background-color: #EFF7FB;">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('section.create', ['id_pelatihan' => $id_pelatihan]) }}">
        <i class="bi bi-grid"></i>
        <span>Tambah Section</span>
      </a>
      </li><!-- End Dashboard Nav -->

    @foreach($section as $section)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('section.index', ['id_pelatihan' => $section->id_pelatihan, 'id_section' => $section->id_section]) }}">
                <span>{{ $section->nama_section }}</span>
            </a>
        </li>
    @endforeach

      <li class="nav-item collapsed">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main><!-- End #main -->

  @if(session('success'))
      <script>
         Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Data berhasil ditambahkan.',
          showConfirmButton: false,
          timer: 2000
         });
      </script>
  @endif


  <!-- Vendor JS Files -->
  <script src="{{ asset('assets2/vendor/apexcharts/apexcharts.min.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/chart.js/chart.umd.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/echarts/echarts.min.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/quill/quill.min.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/simple-datatables/simple-datatables.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/tinymce/tinymce.min.js') }}" ></script>
  <script src="{{ asset('assets2/vendor/php-email-form/validate.js') }}" ></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets2/js/main.js') }}" ></script>

</body>

</html>