
@include('dashboard.layout.header-admin')


<body>

  @include('dashboard.layout.nav-admin')

 @include('dashboard.layout.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="col">
        <div class="row">
            <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Preview Halaman Depan</h5>
                    <div class="ratio ratio-16x9">
                        <iframe src="{{ route('welcome')}}" title="YouTube video" allowfullscreen></iframe>
                      </div>
                    </div>
            </div>
                </div>
        </div>
        <div class="row">
            <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Preview Asset</h5>
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar Halaman Awal</label>
                            <div class="col-sm-10">
                                <img src="{{asset('data/'.$data->foto_home)}}" alt="">
                            </div>
                          </div>
                          <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Foto Profile</label>
                              <div class="col-sm-10">
                                  <img src="{{asset('data/'.$data->foto_profile)}}" height="100px" width="100px" alt="">
                                </div>
                            </div>
                          <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">CV (Curiculum Vitae)</label>
                              <div class="col-sm-10">
                                  <a href="{{asset('data/'.$data->cv)}}" target="blank"  alt="">Lihat PDF</a>
                                </div>
                            </div>

                    </div>
                    </div>
                </div>
            </div>
      </div>
        </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Edit Halaman Depan</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('update_halaman_depan')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar Halaman Awal</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="foto_home" accept=".jpeg, .jpg, .png">
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Greeting</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="greetings" value="{{ $data->greetings}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Depan</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_depan" value="{{ $data->nama_depan}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Belakang</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_belakang" value="{{ $data->nama_belakang}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Keahlian</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="keahlian" value="{{ $data->keahlian}}" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Foto Profile</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="foto_profile" accept=".jpeg, .jpg, .png" >
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Deskrpisi</label>
                            <div class="col-sm-10">
                              <textarea name="deskripsi_keahlian" class="tinymce-editor">{!! $data->deskripsi_keahlian !!}</textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Asal</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="asal" value="{{ $data->asal}}" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tinggal</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tinggal" value="{{ $data->tinggal}}" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="umur" value="{{ $data->umur}}" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">CV (Curiculum Vitae)</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="cv" accept=".docx, .doc, .pdf" >
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary">Save Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->



  @include('dashboard.layout.footer-admin')

  <script>
    document.getElementById('updateForm').addEventListener('submit', function(e) {
        // Ensure TinyMCE saves the content before submitting the form
        tinymce.triggerSave();
        // Additional client-side validation
        const deskripsi = tinymce.get('deskripsi_keahlian').getContent();
        if (!deskripsi) {
            alert('Deskripsi tidak boleh kosong.');
            e.preventDefault();
            return false;
        }
    });
</script>
</body>

</html>
