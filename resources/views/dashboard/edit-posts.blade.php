
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
              <div class="row">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-row-reverse mt-4">
                            <a href="{{route('tambah_post')}}" class="btn btn-primary">Tambah Post</a>
                        </div>

                        <h5 class="card-title">Daftar Postingan</h5>
                        <div class="table-responsive">

                            <table class="table table-bordered datatable">
                                <thead>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                        @foreach ($data as $data_post)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>
                                                <img src="{{asset('data/'.$data_post->image)}}" width="300px" alt="">
                                            </td>
                                            <td>{{$data_post->judul}}</td>
                                            <td>{{$data_post->kategori}}</td>
                                            <td>
                                                <a href="{{route('show_detail_post', $data_post->id)}}" class="btn btn-primary"><i class="bi bi-eye"></i></a>

                                                <button type="button"  data-bs-toggle="modal" data-bs-target="#delete_post{{$data_post->id}}" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                                                <div class="modal fade" id="delete_post{{$data_post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin Mau Mengapus {{$data_post->judul}}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <form action="{{route('delete_post', $data_post->id)}}" method="post">
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
