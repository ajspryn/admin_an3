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
                        <h2 class="content-header-title float-start mb-0">Ubah Data Pengguna</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Menu Utama
                                </li>
                                <li class="breadcrumb-item"><a href="/ketersediaan">Pengguna Layanan</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/ketersediaan">Ubah Data</a>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Ubah Data</h4>
                            </div>
                            <div class="card-body">
                                <form class="row gy-1 pt-75" method="POST" action="/pengguna_layanan/{{ $pengguna_layanans->id }}">
                                    @csrf
                                    @method('put')
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="nama">Nama Pengguna</label>
                                        <input
                                        type="text"
                                        id="nama"
                                        name="nama_pengguna"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->nama_pengguna }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="alamat_1">Alamat 1</label>
                                        <input
                                        type="text"
                                        id="alamat_1"
                                        name="alamat_1"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_1 }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="alamat_2">Alamat 2</label>
                                        <input
                                        type="text"
                                        id="alamat_2"
                                        name="alamat_2"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_2 }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="alamat_3">Alamat 3</label>
                                        <input
                                        type="text"
                                        id="alamat_3"
                                        name="alamat_3"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_3 }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="alamat_4">Alamat 4</label>
                                        <input
                                        type="text"
                                        id="alamat_4"
                                        name="alamat_4"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_4 }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="kode_pos">Kode Pos</label>
                                        <input
                                        type="text"
                                        id="kode_pos"
                                        name="alamat_kodepos"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_kodepos }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="alamat_email">Alamat Email</label>
                                        <input
                                        type="text"
                                        id="alamat_email"
                                        name="alamat_email"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->alamat_email }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="no_telp">Nomor Telepon</label>
                                        <input
                                        type="number"
                                        id="no_telp"
                                        name="no_telp"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->no_telp }}"
                                        />
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="nomor_identitas">Nomor Identitas</label>
                                        <input
                                        type="number"
                                        id="nomor_identitas"
                                        name="nomor_identitas"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->nomor_identitas }}"
                                        />
                                    </div>
                                        <input
                                        type="hidden"
                                        name="user_id"
                                        class="form-control"
                                        value="{{ $pengguna_layanans->user_id }}"
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
            </section>
            <!-- Basic Floating Label Form section end -->

            <!-- Edit User Modal -->
            <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User Information</h1>
                                <p>Updating user details will receive a privacy audit.</p>
                            </div>
                            <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="/pengguna_layanan">
                                @csrf
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="nama">Nama Pengguna</label>
                                    <input
                                    type="text"
                                    id="nama"
                                    name="nama_pengguna"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="alamat_1">Alamat 1</label>
                                    <input
                                    type="text"
                                    id="alamat_1"
                                    name="alamat_1"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="alamat_2">Alamat 2</label>
                                    <input
                                    type="text"
                                    id="alamat_2"
                                    name="alamat_2"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="alamat_3">Alamat 3</label>
                                    <input
                                    type="text"
                                    id="alamat_3"
                                    name="alamat_3"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="alamat_4">Alamat 4</label>
                                    <input
                                    type="text"
                                    id="alamat_4"
                                    name="alamat_4"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="kode_pos">Kode Pos</label>
                                    <input
                                    type="text"
                                    id="kode_pos"
                                    name="alamat_kodepos"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="nama_kontak">Nama Kontak</label>
                                    <input
                                    type="text"
                                    id="nama_kontak"
                                    name="nama_kontak"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="alamat_email">Alamat Email</label>
                                    <input
                                    type="text"
                                    id="alamat_email"
                                    name="alamat_email"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="no_telp">Nomor Telepon</label>
                                    <input
                                    type="number"
                                    id="no_telp"
                                    name="no_telp"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="nomor_identitas">Nomor Identitas</label>
                                    <input
                                    type="number"
                                    id="nomor_identitas"
                                    name="nomor_identitas"
                                    class="form-control"
                                    />
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="alamat_sosmed">Alamat Sosmed</label>
                                    <input
                                    type="text"
                                    id="alamat_sosmed"
                                    name="alamat_sosmed"
                                    class="form-control"
                                    />
                                </div>

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
            <!--/ Edit User Modal -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
