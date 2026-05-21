@include('admin.layouts.meta')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Nama Berita</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Nama Berita</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="card">
                    <div class="card-header d-flex align-items-center">
    <h5 class="mb-0">Data Berita</h5>

    <div class="ms-auto">
        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            + Tambah
        </a>
    </div>
</div>
            <div class="card-body">
                <form action="{{ route('berita.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <select name="kategori_id">
                        <option value="">pilih kategori</option>
                      @foreach ( $kategori as $kategori_item)
                        <option value="{{ $kategori_item->id }}">
                          {{$kategori_item->nama_kategori}}
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Judul berita</label>
                        <input type="text" name="judul_berita" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Isi berita</label>
                        <textarea type="textarea" name="isi_berita" class="form-control"></textarea>
                    </div>
      
                    <div class="mb-3">
                        <label for="">Gambar berita</label>
                        <input type="file" name="gambar" id="gambarInput" class="form-control">
                        <div class="d-flex justify-center">
                          <img id="previewGambar"
                          style="max-width: 300px; display:none; margin-top:10px;">
                        </div>
                    </div>

                    <button class="btn btn-primary">
                        simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->

@include('admin.layouts.footer')
@include('admin.layouts.js')

<script>
    const gambarInput = document.getElementById('gambarInput');
    const previewGambar = document.getElementById('previewGambar');

    gambarInput.addEventListener('change', function(e) {

        const file = e.target.files[0];

        if(file) {
            previewGambar.src = URL.createObjectURL(file);
            previewGambar.style.display = 'block';
        }

    });
</script>