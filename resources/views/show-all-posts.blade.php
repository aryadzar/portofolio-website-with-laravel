
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

  <title>Blog - Minibar</title>

  <link rel="shortcut icon" type="image/ico" href="../assets/favicon.ico">

  <link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/owl-carousel/owl.carousel.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/nice-select/css/nice-select.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/fancybox/css/jquery.fancybox.min.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/virtual.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/minibar.virtual.css">
</head>
<body class="theme-red">

  <!-- Back to top button -->
  <div class="btn-back_to_top">
    <span class="ti-arrow-up"></span>
  </div>

  <!-- Setting button -->
  <div class="config">
    <div class="template-config">
      <!-- Settings -->
      <div class="d-block">
        <button class="btn btn-fab btn-sm" id="sideel" title="Settings"><span class="ti-settings"></span></button>
      </div>
      <!-- Puschase -->
      <div class="d-block">
        <a href="https://macodeid.com/projects/virtual-folio/" class="btn btn-fab btn-sm" title="Get this template" data-toggle="tooltip" data-placement="left"><span class="ti-download"></span></a>
      </div>
      <!-- Help -->
      <div class="d-block">
        <a href="#" class="btn btn-fab btn-sm" title="Help" data-toggle="tooltip" data-placement="left"><span class="ti-help"></span></a>
      </div>
    </div>
    <div class="set-menu">
      <p>Select Color</p>
      <div class="color-bar" data-toggle="selected">
        <span class="color-item bg-theme-red selected" data-class="theme-red"></span>
        <span class="color-item bg-theme-blue" data-class="theme-blue"></span>
        <span class="color-item bg-theme-green" data-class="theme-green"></span>
        <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
        <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
      </div>
      <select class="custom-select" id="change-page">
        <option value="">Choose Page</option>
        <option value="index">Topbar</option>
        <option value="blog-topbar">Blog (Topbar)</option>
        <option value="index-2">Minibar</option>
        <option value="blog-minibar">Blog (Minibar)</option>
      </select>
    </div>
  </div>

  <div class="topbar-nav fixed-top">
    <div class="brand">
      <img src="../assets/favicon.ico" alt="" width="30" height="30">
    </div>
    <h3 class="ml-1">Folio</h3>
    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
  </div>

  <!-- Mini bar -->
  <div class="minibar">
    <div class="header">
      <div class="brand">

      </div>
    </div>
    <div class="content">
      <ul class="main-menu">
        <li class="menu-item active">
          <a href="/" class="menu-link">
            <span class="icon ti-arrow-left"></span>
            <span class="caption">Back</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="footer">
      <div class="social-menu">

      </div>
    </div>
  </div>

  <!-- Main Wrapper -->
  <div class="vg-main-wrapper">
    <div class="vg-page page-blog">
      <div class="container">
        <div class="row widget-grid">
        <div class="container">
            <div class="row post-grid">
                @foreach ($data as $data)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="img-place">
                            <img src="{{ asset('data/' . $data->image) }}" alt="">
                        </div>
                        <div class="caption">
                            <a href="{{route('post_detail', $data->id)}}" class="post-category">{{$data->kategori}}</a>
                            <a href="{{route('post_detail', $data->id)}}" class="post-title">{{$data->judul}}</a>
                            <span class="post-date"><span class="sr-only">Published on</span> {{$data->created_at}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
      </div>
    </div>


       <!-- Footer -->
       <div class="vg-footer">
        <h1 class="text-center">Arya's Portofolio</h1>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 py-3">
              <div class="footer-info">
                <p>Where to find me</p>
                <hr class="divider">
                <p class="fs-large fg-white">Jalur dua Univeristas Lampung, Jalan Prof. Dr Jl. Prof. Dr. Ir. Sumantri Brojonegoro No.1, Kota Bandar Lampung, Lampung 35141</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
              <div class="float-lg-right">
                <p>Follow me</p>
                <hr class="divider">
                <ul class="list-unstyled">
                  <li><a href="https://www.instagram.com/aryadzar/">Instagram</a></li>
                  <li><a href="https://www.facebook.com/dzaky.arenanto/?locale=hi_IN">Facebook</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 py-3">
              <div class="float-lg-right">
                <p>Contact me</p>
                <hr class="divider">
                <ul class="list-unstyled">
                  <li>aryadzaky8494@gmail.com</li>
                  <li>+6282186796121</li>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-12">
              <p class="text-center mb-0 mt-4">Copyright &copy;2020 aryadzar.my.id. All right reserved </p>
            </div>
          </div>
        </div>
      </div> <!-- End footer -->
  </div> <!-- End main wrapper -->

  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/owl-carousel/owl.carousel.min.js"></script>

  <script src="../assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

  <script src="../assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>

  <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="../assets/js/google-maps.js"></script>

  <script src="../assets/js/minibar-virtual.js"></script>

  <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

</body>
</html>
