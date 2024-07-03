
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

                        <h5 class="card-title">Daftar Yang Menghubungi Mu</h5>
                        <div class="table-responsive">

                            <table class="table table-bordered datatable">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                        @foreach ($data as $data)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->subject}}</td>
                                            <td>{{$data->message}}</td>
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
