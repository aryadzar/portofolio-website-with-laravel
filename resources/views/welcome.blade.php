
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


</head>
<body class="theme-red">

  <!-- Back to top button -->


      <!-- JavaScript -->
      <audio id="background-audio" src="瞬き (Instrumental).mp3" loop></audio>


  <div class="topbar-nav fixed-top">
    <div class="brand">
      <img src="../assets/favicon.ico" alt="" width="30" height="30">
    </div>
    <h3 class="ml-1">Arya Dzaky</h3>
    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
  </div>

  <!-- Minibar -->
  <div class="minibar">
    <div class="header">
      <div class="brand">

      </div>
    </div>
    <div class="content">
      <ul class="main-menu">
        <li class="menu-item active">
          <a href="#home" class="menu-link">
            <span class="icon ti-home"></span>
            <span class="caption">Home</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#about" class="menu-link">
            <span class="icon ti-user"></span>
            <span class="caption">About</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#services" class="menu-link">
            <span class="icon ti-file"></span>
            <span class="caption">Service</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#portfolio" class="menu-link">
            <span class="icon ti-briefcase"></span>
            <span class="caption">Portfolio</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#blog" class="menu-link">
            <span class="icon ti-book"></span>
            <span class="caption">Blog</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#contact" class="menu-link">
            <span class="icon ti-location-pin"></span>
            <span class="caption">Contact</span>
          </a>
        </li>
        <li class="menu-item">
            <button id="toggle-audio" class="btn btn-primary">Start Audio</button>
            <span class="caption">Music</span>
        </li>
      </ul>
    </div>
  </div>
  <script>
    const audioElement = document.getElementById('background-audio');
    const toggleButton = document.getElementById('toggle-audio');

    toggleButton.addEventListener('click', function() {
        if (audioElement.paused) {
            audioElement.play().catch(error => {
                console.log('Audio playback failed:', error);
            });
            toggleButton.textContent = 'Pause Audio';
        } else {
            audioElement.pause();
            toggleButton.textContent = 'Play Audio';
        }
    });

    // Optional: Start playing audio automatically with user interaction
    document.addEventListener('click', function() {
        if (audioElement.paused) {
            audioElement.play().catch(error => {
                console.log('Audio playback failed:', error);
            });
            toggleButton.textContent = 'Pause Audio';
        }
    }, { once: true });
</script>
  <div class="vg-main-wrapper">
    <div class="vg-page page-home" id="home" style="background-image: url('{{asset('data/'.$hal_depan->foto_home)}}');">
      <div class="caption wow zoomInUp">
        <h1 class="fw-normal">{{$hal_depan->greetings}}</h1>
        <h2 class="fw-medium fg-theme">Saya {{$hal_depan->nama_depan}}</h2>
        <p class="tagline">{{$hal_depan->keahlian}}</p>
      </div>
    </div>

    <!-- Page About -->
    <div class="vg-page page-about" id="about">
      <!-- Profile -->
      <div class="container py-3">
        <div class="row">
          <div class="col-md-6">
            <div class="img-place wow zoomIn">
              <img src="{{asset('data/'.$hal_depan->foto_profile)}}" alt="Photo Profile">
            </div>
          </div>
          <div class="col-md-6">
            <div class="caption wow fadeInRight">
              <h2 class="fg-dark">{{$hal_depan->nama_depan}} {{$hal_depan->nama_belakang}}</h2>
              <p class="fg-theme fw-medium">{{$hal_depan->keahlian}}</p>
                {!! $hal_depan->deskripsi_keahlian !!}
              <ul class="theme-list">
                <li class="fg-dark"><b>From:</b>  {{$hal_depan->asal}}</li>
                <li class="fg-dark"><b>Lives In:</b>  {{$hal_depan->tinggal}}</li>
                <li class="fg-dark"><b>Age:</b>  {{$hal_depan->umur}}</li>
                <li class="fg-dark"><b>Gender:</b> Male</li>
              </ul>
              <a href="{{asset('data/'.$hal_depan->cv)}}" class="btn btn-theme btn-rounded" target="blank">Download CV</a>
            </div>
          </div>
        </div>
      </div> <!-- End profile -->

      <!-- Resume -->
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-6 wow fadeInRight">
            <h2 class="fg-dark">Pendidikan</h2>
            <ul class="timeline mt-4 pr-md-5">
                @foreach ($data_pendidikan as $data)
                <li>
                  <div class="title">{{ $data->tahun}}</div>
                  <div class="details">
                    <h5>{{ $data->jurusan}}</h5>
                    <small class="fg-theme">{{ $data->nama_sekolah}}</small>
                    {!!  $data->deskripsi !!}
                  </div>
                </li>
                @endforeach

            </ul>
          </div>
          <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
            <h2 class="fg-dark">Pengalaman</h2>
            <ul class="timeline mt-4 pr-md-5">
                @foreach ($data_pengalaman as $data)
                <li>
                  <div class="title">{{ $data->tahun}}</div>
                  <div class="details">
                    <h5>{{ $data->pengalaman}}</h5>
                    <small class="fg-theme">{{ $data->nama_sekolah}}</small>
                    {!!  $data->deskripsi !!}
                  </div>
                </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div> <!-- End resume -->
    </div> <!-- End page about -->


<!-- Page Service -->
<!-- Page Service -->
<div class="vg-page page-service" id="services">
    <h1 class="text-center wow fadeInUp">Services</h1>
    <div class="container">
      <div class="row">
        @foreach ($services as $data)
        <div class="col-md-6 col-lg-4 wow fadeInUp">
          <div class="card card-body">
            <div class="iconic mb-1">
              {!! $data->logo !!}
            </div>
            <h4 class="fg-theme">{{ $data->judul }}</h4>
            {!! ($data->deskripsi_singkat) !!}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


    <!-- Testimonials -->
    <div class="vg-page p-0" id="testimonial">
      <div class="owl-carousel testi-carousel" style="background-image: url('{{asset("data/".$image_testi->image)}}');">
        @foreach ($testimoni as $data)
        <div class="item">
            {!! $data->testimoni !!}
          <h4>{{$data->nama}}</h4>
        </div>

        @endforeach

      </div>
    </div> <!-- End testimonial -->

    <!-- Portfolio page -->
    <div class="vg-page page-portfolio" id="portfolio">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="badge badge-subhead">Portfolio</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">See my work</h1>
        <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
          <button class="btn btn-theme-outline selected" data-filter="*">All</button>
          @foreach ($kategori_jenis  as $data)
          <button class="btn btn-theme-outline" data-filter=".{{$data->nama_class}}">{{$data->nama_kategori}}</button>
          @endforeach
        </div>

        <div class="gridder my-3">
            @foreach ($portofolio as $data)
          <div class="grid-item {{$data->jenis->nama_class}} wow zoomIn">
            <div class="img-place" data-src="{{asset('data/'.$data->image)}}" data-fancybox data-caption="<h5 class='fg-theme'>{{$data->judul}}</h5> <p>{{$data->deskripsi}}</p>">
              <img src="{{asset('data/'.$data->image)}}" alt="">
              <div class="img-caption">
                <h5 class="fg-theme">{{$data->judul}}</h5>
                <p>{{$data->deskripsi}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div> <!-- End Portfolio page -->

    <!-- Page Blog -->
    <div class="vg-page page-blog" id="blog">
      <h1 class="text-center fg-dark wow fadeInUp">Latest Post</h1>
      <div class="container">
        <div class="row post-grid">
            @foreach ($postingan as $post)
            <div class="col-md-6 col-lg-4 wow fadeInUp">
              <div class="card">
                <div class="img-place">
                  <img src="{{asset('data/'.$post->image)}}" alt="">
                </div>
                <div class="caption">
                  <a href="{{route('post_detail', $post->id)}}" class="post-category">{{$post->kategori}}</a>
                  <a href="{{route('post_detail', $post->id)}}" class="post-title">{{$post->judul}}</a>
                  <span class="post-date"><span class="sr-only">Published on</span> {{$post->created_at}}</span>
                </div>
              </div>
            </div>

            @endforeach
          <div class="col-12 text-center py-3 wow fadeInUp">
            <a href="{{route('all_posts')}}" class="btn btn-theme">See All Post</a>
          </div>
        </div>
      </div>
    </div> <!-- End page blog -->

    <!-- Page Contact -->
    <div class="vg-page page-contact" id="contact">
      <h1 class="text-center fg-dark wow fadeInUp">Contact</h1>
      <div class="container-fluid">
        <div class="row py-5">
          <div class="col-lg-7 wow zoomIn">
            <div class="vg-maps">
                <div class="table-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.220568102044!2d105.24162151183266!3d-5.3833104538092815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dac0b8d151e3%3A0xe833385ddd262c1a!2sTaman%20Perumahan%20Palapa%20Indah!5e0!3m2!1sen!2sid!4v1720022163212!5m2!1sen!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
          </div>
          <div class="col-lg-5">
            <form action="{{route('send_contact')}}" method="POST" class="vg-contact-form">
                @csrf
              <div class="form-row">
                <div class="col-12 wow fadeInUp">
                  <input class="form-control" type="text" name="name" placeholder="Your Name">
                </div>
                <div class="col-6 wow fadeInUp">
                  <input class="form-control" type="text" name="email" placeholder="Email Address">
                </div>
                <div class="col-6 wow fadeInUp">
                  <input class="form-control" type="text" name="subject" placeholder="Subject">
                </div>
                <div class="col-12 wow fadeInUp">
                  <textarea class="form-control" name="message" rows="6" placeholder="Enter message here.."></textarea>
                </div>
                <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- End page contact -->

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

  <script>
document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.read-more');

  buttons.forEach(button => {
    button.addEventListener('click', function () {
      const cardBody = this.closest('.card-body');
      const shortDescription = cardBody.querySelector('.short-description');
      const fullDescription = cardBody.querySelector('.full-description');

      if (fullDescription.style.display === 'none') {
        fullDescription.style.display = 'block';
        shortDescription.style.display = 'none';
        this.textContent = 'Read Less';
      } else {
        fullDescription.style.display = 'none';
        shortDescription.style.display = 'block';
        this.textContent = 'Read More';
      }
    });
  });
});
  </script>

@include('sweetalert::alert')
</body>
</html>
