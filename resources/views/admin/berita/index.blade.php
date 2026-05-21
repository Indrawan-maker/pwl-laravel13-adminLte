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
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>Gambar</th>
                                <th width="200">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($berita as $berita_item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $berita_item->judul_berita }}</td>
                                    <td>{{ $berita_item->isi_berita }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $berita_item->gambar) }}" alt="" width="120">
                                    </td>
                                    <td>
                                        <a href="{{ route('berita.edit', $berita_item->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('berita.destroy', $berita_item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm"
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