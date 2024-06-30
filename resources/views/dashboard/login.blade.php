@include('dashboard.layout.header-admin')

<body>

    <main>
      <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                  <a href="{{ route('login')}}" class="logo d-flex align-items-center w-auto">
                    <img src=" {{asset('dashboard/assets/img/logo.png')}}" alt="">
                    <span class="d-none d-lg-block">Login Dashboard</span>
                  </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                  <div class="card-body">


                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your username  password to login</p>
                    </div>

                    @if(session()->has('loginError'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <form action="{{ route('login')}}" class="row g-3 needs-validation" method="POST" novalidate>
                        @csrf
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="email" name="email" class="form-control" id="yourUsername" value="{{ old('email')}}" required>
                          <div class="invalid-feedback">Please enter email correctly.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Forgot Password ?  <a href="pages-register.html">Click Here</a></p>
                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

      </div>
    </main><!-- End #main -->

    @include('dashboard.layout.footer-admin')
