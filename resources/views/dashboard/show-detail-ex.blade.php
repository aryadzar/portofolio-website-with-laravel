
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
                    <h5 class="card-title">Edit Form Pendidikan / Pengalaman</h5>
                        @if ($tipeform == 'form_pendidikan')
                        <form action="{{route('edit_pendidikan', $data_pendidikan->id) }}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="tahun" value="{{$data_pendidikan->tahun}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="jurusan" value="{{ $data_pendidikan->jurusan}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah / Kampus</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sekolah" value="{{ $data_pendidikan->nama_sekolah}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" class="tinymce-editor" id="deskripsiPendidikan" >{{$data_pendidikan->deskripsi}}</textarea>
                                </div>
                              </div>

                              <button type="submit" class="btn btn-primary mb-3 submit-btn">Save Changes</button>

                        </form>
                        @elseif($tipeform == 'form_pengalaman')
                        <form action="{{route('edit_pengalaman', $data_pengalaman->id) }}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="tahun" value="{{ $data_pengalaman->tahun}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pengalaman</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="pengalaman" value="{{ $data_pengalaman->pengalaman}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah / Kampus</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sekolah" value="{{ $data_pengalaman->nama_sekolah}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" class="tinymce-editor"  id="deskripsiPengalaman" >{{$data_pengalaman->deskripsi}}</textarea>
                                </div>
                              </div>

                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

                        </form>
                        @endif



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
