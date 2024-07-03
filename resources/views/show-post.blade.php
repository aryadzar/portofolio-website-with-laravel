
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

  <title>Arya Dzaky 's Portfolio</title>

  <link rel="shortcut icon" type="image/x-icon" href=" {{asset('../assets/favicon.ico')}}">

  <link rel="stylesheet" type="text/css" href=" {{asset('../assets/css/themify-icons.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/bootstrap.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/vendor/owl-carousel/owl.carousel.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/vendor/nice-select/css/nice-select.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/vendor/fancybox/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/virtual.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/minibar.virtual.css')}}">

  <style>
    .background-image-wrapper {
    position: absolute;
    width: 100%;
    height: 500px; /* Atur sesuai kebutuhan */
    overflow: hidden;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0.5; /* Opacity hanya untuk gambar latar belakang */
        z-index: -1; /* Pastikan ini berada di belakang konten */
    }
    .container {
    padding: 20px;
}

.responsive-title {
    color: #000000;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.responsive-category {
    color: #000000;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.content {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

/* Media Queries for Responsiveness */
@media (max-width: 1200px) {
    .background-image-wrapper {
        height: 40vh;
    }
}

@media (max-width: 992px) {
    .background-image-wrapper {
        height: 30vh;
    }

    .container {
        padding: 15px;
    }

    .content {
        padding: 15px;
    }
}

@media (max-width: 768px) {
    .background-image-wrapper {
        height: 25vh;
    }

    .responsive-title {
        font-size: 1.5rem;
    }

    .responsive-category {
        font-size: 1rem;
    }

    .container {
        padding: 10px;
    }

    .content {
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .background-image-wrapper {
        height: 20vh;
    }

    .responsive-title {
        font-size: 1.25rem;
    }

    .responsive-category {
        font-size: 0.875rem;
    }

    .container {
        padding: 5px;
    }

    .content {
        padding: 5px;
    }
}
  </style>
</head>
<body class="theme-red">

  <!-- Back to top button -->


  <div class="topbar-nav fixed-top">
    <div class="brand">
      <img src="../assets/favicon.ico" alt="" width="30" height="30">
    </div>
    <h3 class="ml-1">Arya Dzaky</h3>
    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
  </div>

  <!-- Minibar -->
   <!-- Mini bar -->
   <div class="minibar">
    <div class="header">
      <div class="brand">

      </div>
    </div>
    <div class="content">
      <ul class="main-menu">
        <li class="menu-item active">
          <a href="{{route('all_posts')}}" class="menu-link">
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

  <div class="vg-main-wrapper">
      <div class="background-image-wrapper">
          <div class="background-image" style="background-image: url('{{asset('data/'.$data->image)}}');"></div>
      </div>
    <div class="vg-page page-blog">
        <div class="vg-page page">
            <div class="container">
                <h1 class="responsive-title">{{$data->judul}}</h1>
                <br>
                <h5 class="responsive-category">Kategori: {{$data->kategori}}</h5>
                <div class="content">
                    {!! $data->isi !!}
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


  <script src="{{asset('../assets/js/jquery-3.5.1.min.js')}}"></script>

  <script src="{{asset('../assets/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>

  <script src="{{asset('../assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/nice-select/js/jquery.nice-select.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/fancybox/js/jquery.fancybox.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/wow/wow.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>

  <script src="{{asset('../assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>

  <script src="{{asset('../assets/js/google-maps.js')}}"></script>

  <script src="{{asset('../assets/js/minibar-virtual.js')}}"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>
</html>
