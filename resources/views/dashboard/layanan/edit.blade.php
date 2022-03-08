@extends('dashboard.layout.main')

@section('container')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Layanan Anda</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard
                                </li>
                                <li class="breadcrumb-item"><a href="/layanan">Layanan</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form edit layanan </h4>
                                </div>
                                <div class="card-body">
                                    <form class="row gy-1 pt-75" method="POST" action="/layanan/{{ $layanan->id }}">
                    @method("put")
                    @csrf
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="nama_singkat">Nama Singkat</label>
                        <input
                        type="text"
                        id="nama_singkat"
                        name="nama_singkat"
                        class="form-control"
                        value="{{ $layanan->nama_singkat }}"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="penjelasan_1">Penjelasan 1</label>
                        <input
                        type="text"
                        id="penjelasan_1"
                        name="penjelasan_1"
                        class="form-control"
                        value="{{ $layanan->penjelasan_1 }}"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="penjelasan_2">Penjelasan 2</label>
                        <input
                        type="text"
                        id="penjelasan_2"
                        name="penjelasan_2"
                        class="form-control"
                        value="{{ $layanan->penjelasan_2 }}"
                        />
                    </div>

                    <input
                    type="hidden"
                    name="user_id"
                    class="form-control"
                    value="{{ Auth::user()->id }}"
                    />
                    <input
                    type="hidden"
                    name="penyedia_layanan_id"
                    class="form-control"
                    @foreach ($penyedia_layanans as $penyedia_layanan)
                    value="{{ $penyedia_layanan->id }}"
                    @endforeach
                    />

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                    </div>
                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- tambah layanan -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Tambah layanan</h1>
                    <p>Masukan data layanan.</p>
                </div>
                <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="layanan">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="nama_singkat">Nama Singkat</label>
                        <input
                        type="text"
                        id="nama_singkat"
                        name="nama_singkat"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="penjelasan_1">Penjelasan 1</label>
                        <input
                        type="text"
                        id="penjelasan_1"
                        name="penjelasan_1"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="penjelasan_2">Penjelasan 2</label>
                        <input
                        type="text"
                        id="penjelasan_2"
                        name="penjelasan_2"
                        class="form-control"
                        />
                    </div>

                    <input
                    type="hidden"
                    name="user_id"
                    class="form-control"
                    value="{{ Auth::user()->id }}"
                    />
                    <input
                    type="hidden"
                    name="penyedia_layanan_id"
                    class="form-control"
                    @foreach ($penyedia_layanans as $penyedia_layanan)
                    value="{{ $penyedia_layanan->id }}"
                    @endforeach
                    />

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ tambah layanan -->

@endsection
