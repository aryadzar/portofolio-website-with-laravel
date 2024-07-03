
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
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Preview Halaman Depan</h5>
                    <div class="ratio ratio-4x3">
                        <iframe src="{{ route('welcome')}}" title="YouTube video" allowfullscreen></iframe>
                      </div>
                    </div>
                </div>
            </div><div class="row">
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
              <div class="col">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Background Testimoni</h5>
                            <img src="{{asset('data/'.$back_image_testi->image)}}" width="500px" alt="">
                            <hr>
                        <h5 class="card-title">Daftar Service</h5>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Testimoni</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{!! $data->nama !!}</td>
                                        <td>{!! $data->testimoni !!}</td>
                                        <td>
                                            <a href="{{route('show_detail_testimoni', $data->id)}}"   class="btn btn-primary "><i class="bi bi-eye"></i></a>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete_testimoni{{$data->id}}"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <div class="modal fade" id="delete_testimoni{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p> Yakin Mau Mengapus testimoni {{$data->nama}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <form action="{{route('delete_testimoni', $data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        </div>
                    </div>
                </div>
              <div class="col">
                <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Form Edit Gambar</h5>
                        <form action="{{route('edit_gambar_testimoni')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Gambar Halaman Awal</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="image" accept=".jpeg, .jpg, .png">
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

                        </form>

                        <hr>
                        <h5 class="card-title">Form Tambah Testimoni</h5>
                        <form action="{{route('tambah_testimoni')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama" value="{{ old('nama')}}" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Testimoni</label>
                                <div class="col-sm-10">
                                  <textarea type="text" class="tinymce-editor" name="testimoni" required>{{old('testimoni')}}</textarea>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

                        </form>
                        </div>
                        </div>
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
