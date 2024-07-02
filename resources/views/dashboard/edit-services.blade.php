
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
                        <h5 class="card-title">Daftar Service</h5>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Logo</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
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
                                        <td>{!! $data->logo !!}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{!! $data->deskripsi_singkat !!}</td>
                                        <td>
                                            <a href="{{route('show_details_service', $data->id)}}"   class="btn btn-primary "><i class="bi bi-eye"></i></a>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete_service{{$data->id}}"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <div class="modal fade" id="delete_service{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p> Yakin Mau Mengapus {{$data->judul}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <form action="{{route('delete_details_service', $data->id)}}" method="post">
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
                        <h5 class="card-title">Form Tambah</h5>
                        <form action="{{route('tambah_services')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                  <textarea type="text" id="logo" class="tinymce-editor" name="logo" value="{{ old('logo')}}" required></textarea>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" value="{{ old('judul')}}" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                  <textarea type="text" class="tinymce-editor" name="deskripsi_singkat" required>{{old('deskripsi_singkat')}}</textarea>
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
