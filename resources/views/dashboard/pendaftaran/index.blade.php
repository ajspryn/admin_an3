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
                        <h2 class="content-header-title float-start mb-0">Pendaftaran Layanan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Menu Utama
                                </li>
                                <li class="breadcrumb-item"><a href="/ketersediaan">Pendaftaran</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Masukan Nomor Identitas Pendaftar </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="/pendaftaran" >
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nomor Identias</label>
                                                    <input type="number" id="first-name-column" name="nomor_identitas" class="form-control" value="{{ request('nomor_identitas') }}" />
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

                @if ($pengguna_layanan->count())
                    <!-- Project table -->
                    <div class="card">
                        <h4 class="card-header">Pengguna Dengan Nomor Identitas = {{ request('nomor_identitas') }}</h4>
                        <div class="table-responsive">
                        <table class="table datatable-project">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th class="text-nowrap">No Telepone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach ($pengguna_layanan as $pl)
                                <td>{{ $pl->nama_pengguna }}</td>
                                <td>{{ $pl->alamat_1 }}, {{ $pl->alamat_2 }}, {{ $pl->alamat_3 }}, {{ $pl->alamat_4 }}, {{ $pl->alamat_kodepos }}</td>
                                <td>{{ $pl->no_telp }}</td>
                                <td>{{ $pl->alamat_email }}</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#daftar"><span>Daftar</span></button></td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- /Project table -->
                    @else
                    
                    @endif

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="daftar" tabindex="-1" aria-hidden="true">
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
                                    <form class="row gy-1 pt-75" method="post" action="/pendaftaran">
                                        @csrf
                                        <div class="col-12 col-md-12">
                                            <label class="form-label" for="first-name-column">Layanan</label>
                                            <select class="form-select" aria-label="Default select example" value="{{ request('layanan_id') }}" name="layanan_id" required >
                                                <option selected>Pilih Layanan</option>
                                                @foreach ($layanans as $layanan )
                                                <option value="{{ $layanan->id }}">{{ $layanan->nama_singkat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="tanggal_layanan">Tanggal Layanan</label>
                                            <input
                                            class="form-control flatpickr-basic"
                                            placeholder="YYYY-MM-DD"
                                            type="date"
                                            id="tanggal_layanan"
                                            name="tanggal_layanan"
                                            class="form-control flatpickr-basic"
                                            required
                                            />
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label class="form-label" for="keterangan_pendaftaran">Keterangan Pendaftaran</label>
                                            <input
                                            type="text"
                                            id="keterangan_pendaftaran"
                                            name="keterangan_pendaftaran"
                                            class="form-control"
                                            />
                                        </div>
                                        <input
                                        type="hidden"
                                        id="no_telp"
                                        name="no_telp"
                                        class="form-control"
                                        @foreach ($pengguna_layanan as $pl)
                                        value="{{ $pl->no_telp }}"
                                        @endforeach
                                        />
                                        <input
                                        type="hidden"
                                        name="keterangan_tambahan_status"
                                        class="form-control"
                                        value="Butuh Konfirmasi"
                                        />
                                        <input
                                        type="hidden"
                                        name="status_transaksi"
                                        class="form-control"
                                        value="Berhasil Mendaftar"
                                        />
                                        <input
                                        type="hidden"
                                        id="no_identitas"
                                        name="nomor_identitas"
                                        class="form-control"
                                        @foreach ($pengguna_layanan as $pl)
                                        value="{{ $pl->nomor_identitas }}"
                                        @endforeach
                                        />
                                        <input
                                        type="hidden"
                                        name="penyedia_layanan_id"
                                        @foreach ($penyedia_layanans as $penyedia_layanan)
                                        value="{{ $penyedia_layanan->id }}"
                                        @endforeach
                                        />
                                        <input
                                        type="hidden"
                                        name="layanan_id"
                                        @foreach ($layanans as $layanan)
                                        value="{{ $layanan->id }}"
                                        @endforeach
                                        />
                                        <input
                                        type="hidden"
                                        name="pengguna_id"
                                        @foreach ($pengguna_layanan as $pl)
                                        value="{{ $pl->id }}"
                                        @endforeach
                                        />
                                        <input
                                        type="hidden"
                                        name="nama_pengguna"
                                        @foreach ($pengguna_layanan as $pl)
                                        value="{{ $pl->nama_pengguna }}"
                                        @endforeach
                                        />
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                Discard
                                            </button>
                                        </div>
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
    <!-- Solid -->
    <!--/ Style variation -->
</div>
<!-- END: Content-->

@endsection
