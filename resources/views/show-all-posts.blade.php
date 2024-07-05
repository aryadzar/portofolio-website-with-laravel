
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

  <title>Show All Posts</title>

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



  <div class="topbar-nav fixed-top">
    <div class="brand">
      <img src="../assets/favicon.ico" alt="" width="30" height="30">
    </div>
    <h3 class="ml-1">Arya Dzaky</h3>
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

  <div class="vg-main-wrapper">
    <div class="vg-page page-blog">
      <div class="container">
        <div class="row widget-grid">
          <div class="col-lg-8">
            <div class="input-group py-2">
              <input type="text" class="form-control" placeholder="Search" id="search-input" value="{{ request('search') }}">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex py-2 mx-n2">
              <div class="input-group px-2">
                <select class="vg-select" id="category-select">
                  <option value="">Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->kategori }}" {{ request('category') == $category->kategori ? 'selected' : '' }}>
                      {{ $category->kategori }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="input-group px-2">
                <select class="vg-select" id="sort-select">
                  <option value="">Sort By</option>
                  <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest</option>
                  <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row post-grid">
          @foreach($data as $post)
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="card">
                <div class="img-place">
                  <img src="{{ asset('data/' . $post->image) }}" alt="" class="card-img-top">
                </div>
                <div class="caption card-body">
                  <a href="javascript:void(0)" class="post-category">{{ $post->kategori }}</a>
                  <a href="{{ route('post_detail', $post->id) }}" class="post-title">{{ $post->judul }}</a>
                  <span class="post-date"><span class="sr-only">Published on</span> {{ $post->created_at }}</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="col-12 py-3">
          <ul class="pagination justify-content-center">
            <li class="page-item">{{ $data->appends(request()->input())->links("vendor.pagination.bootstrap-5") }}</li>
          </ul>
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
  <script>
    $(document).ready(function() {
        $('#search-input, #category-select, #sort-select').on('change', function() {
            var query = {
                search: $('#search-input').val(),
                category: $('#category-select').val(),
                sort: $('#sort-select').val()
            };

            var url = '{{ route("all_posts") }}' + '?' + $.param(query);
            window.location.href = url;
        });
    });
</script>
</body>
</html>
