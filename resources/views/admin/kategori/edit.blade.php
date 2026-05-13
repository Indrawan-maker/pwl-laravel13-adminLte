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
                <h3 class="mb-0">Nama Kategori Berita</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Nama Kategori</li>
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
    <h5 class="mb-0">Data Kategori</h5>

    <div class="ms-auto">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            + Tambah
        </a>
    </div>
</div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id )}}" method="POST">
                    @csrf
                    @METHOD('PUT')
                    <div class="mb-3">
                        <label for="">Nama kategori</label>
                        <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori}}" class="form-control">
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