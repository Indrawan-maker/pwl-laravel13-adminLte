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
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th width="200">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($kategori as $kategori_item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori_item->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $kategori_item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $kategori_item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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