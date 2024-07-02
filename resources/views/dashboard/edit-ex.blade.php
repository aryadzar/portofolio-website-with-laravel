
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
                    <h5 class="card-title">Education</h5>
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Jurusan</th>
                                    <th>Nama Sekolah/Kampus</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $no_pen = 1;
                            @endphp
                            <tbody>
                                @foreach ($data_pendidikan as $data)
                                <tr>
                                    <td>{{$no_pen++}}</td>
                                    <td>{{$data->tahun}}</td>
                                    <td>{{$data->jurusan}}</td>
                                    <td>{{$data->nama_sekolah}}</td>
                                    <td width="20%">{!! $data->deskripsi !!}</td>
                                    <td>
                                        <a href="{{route('show_detail_ex', [$data->id, "form_pendidikan"])}}" class="btn btn-primary "><i class="bi bi-eye"></i></a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete_pendidikan{{$data->id}}"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_pendidikan{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p> Yakin Mau Mengapus Pendidikan {{$data->nama_sekolah}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <form action="{{route('delete_pendidikan', $data->id)}}" method="post">
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
                    <h5 class="card-title">Experience</h5>
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Pengalaman</th>
                                    <th>Nama Sekolah/Kampus</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($data_pengalaman as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->tahun}}</td>
                                    <td>{{$data->pengalaman}}</td>
                                    <td>{{$data->nama_sekolah}}</td>
                                    <td width="20%">{!! $data->deskripsi !!}</td>
                                    <td>
                                        <a href="{{route('show_detail_ex', [$data->id, "form_pengalaman"])}}"   class="btn btn-primary "><i class="bi bi-eye"></i></a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete_pengalaman{{$data->id}}"  class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_pengalaman{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p> Yakin Mau Mengapus Pendidikan {{$data->pengalaman}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <form action="{{route('delete_pengalaman', $data->id)}}" method="post">
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
          </div>

      </div>
        </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Tambah Pendidikan dan Pengalaman</h5>
                    <h6 class="card-title">Tambah Pendidikan</h6>
                    <form action="{{route('tambah_pendidikan')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tahun" value="{{ old('tahun')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah / Kampus</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_sekolah" value="{{ old('nama_sekolah')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="tinymce-editor" id="deskripsiPendidikan" >{{old('deskripsi')}}</textarea>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary mb-3 submit-btn">Save Changes</button>

                    </form>
                    <hr>
                    <h6 class="card-title mt-5">Tambah Pengalaman</h6>
                    <form action="{{route('tambah_pengalaman')}}" id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tahun" value="{{ old('tahun')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Pengalaman</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="pengalaman" value="{{ old('pengalaman')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah / Kampus</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_sekolah" value="{{ old('nama_sekolah')}}" required>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="tinymce-editor"  id="deskripsiPengalaman" >{{old('deskripsi')}}</textarea>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>

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
