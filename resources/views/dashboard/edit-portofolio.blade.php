
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
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Preview Halaman Depan</h5>
                    <div class="ratio ratio-4x3">
                        <iframe src="{{ route('welcome')}}" title="YouTube video" allowfullscreen></iframe>
                      </div>
                    </div>
                </div>
            </div>
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
                        <h5 class="card-title">Daftar Jenis Portofolio</h5>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Nama Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data_jenis as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>{{$data->nama_class}}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit_kategori{{$data->id}}"  class="btn btn-primary "><i class="bi bi-eye"></i></button>
                                            <div class="modal fade" id="edit_kategori{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Modal</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('edit_detail_kategori_portofolio', $data->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-2 col-form-label">Nama Kategori</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" class="form-control" name="nama_kategori" value="{{ $data->nama_kategori}}" required>
                                                                </div>
                                                              </div>
                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-2 col-form-label">Nama Class</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" class="form-control" name="nama_class" value="{{ $data->nama_class}}" required>
                                                                </div>
                                                              </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Edit Data</button>

                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete_jenis{{$data->id}}"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <div class="modal fade" id="delete_jenis{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p> Yakin Mau Mengapus kategori {{$data->nama_kategori}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <form action="{{route('delete_kategori_portofolio', $data->id)}}" method="post">
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
                        <h5 class="card-title">Daftar Konten Portofolio</h5>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama Class</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data_konten as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->jenis->nama_kategori}}</td>
                                        <td>{{$data->jenis->nama_class}}</td>
                                        <td>
                                            <img src="{{asset('data/'.$data->image)}}" width="100px" alt="">
                                        </td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->deskripsi}}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#edit_konten{{$data->id}}" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <div class="modal fade" id="edit_konten{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Modal</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('edit_detail_konten_portofolio', $data->id)}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label">Pilih Kategori</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" name="id_jenis" aria-label="Default select example" required>
                                                                            <option disabled selected>Pilih Kategori yang diinginkan</option>
                                                                            @foreach ($data_jenis as $jenis)
                                                                                <option value="{{$jenis->id}}" {{$data->jenis->id == $jenis->id ? "selected" : "" }}>{{$jenis->nama_kategori}} - {{$jenis->nama_class}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
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
                                                                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#delete_content{{$data->id}}" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="modal fade" id="delete_content{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin Mau Mengapus {{$data->judul}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <form action="{{route('delete_konten_portofolio', $data->id)}}" method="post">
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
              <div class="row">
                <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Form Tambah Kategori Portofolio</h5>
                        <form action="{{route('tambah_kategori_portofolio')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_kategori" value="{{ old('nama_kategori')}}" required>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Class</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_class" value="{{ old('nama_class')}}" required>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

                        </form>
                        <h5 class="card-title">Form Tambah Konten Portofolio</h5>
                        <form action="{{route('tambah_konten_portofolio')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pilih Kategori</label>
                                <div class="col-sm-10">
                                  <select class="form-select" name="id_jenis" aria-label="Default select example" required>
                                    <option disabled selected>Pilih Kategori yang diinginkan</option>
                                    @foreach ($data_jenis as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}} - {{$data->nama_class}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                  <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                                  <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" value="{{ old('image')}}" required>
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
                                  <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi')}}" required>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

                        </form>
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
