
@include('dashboard.layout.header-admin')


<body>

  @include('dashboard.layout.nav-admin')

 @include('dashboard.layout.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
            <div class="row">
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
              <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Daftar Postingan</h5>
                        <form action="{{route('edit_detail_post', $data->id)}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Sampul Depan</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="image">
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" value="{{ $data->judul}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="kategori" value="{{ $data->kategori}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                  <textarea type="text" class="tinymce-editor" name="isi" required>{{ $data->isi}}</textarea>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </form>
                    </div>
                    </div>
                </div>
        </div>
    </section>

  </main>



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
