@extends('dashboard.layout.main')

@section('container')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="card-style-variation">
                {{-- <h2 class="mb-2">Style Variation</h2> --}}
                <div class="content-header-left text-md-end col-md-12 col-12 d-md-block d-none">
                    <div class="mb-3 breadcrumb-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata"><i data-feather='plus'> </i><span> Tambah Data</span></button>
                        </div>
                    </div>
                </div>
                <!-- Solid -->
                <div class="row">
                    @foreach ($layanans as $layanan)
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h4 class="card-title text-white">{{ $layanan->nama_singkat }}</h4>
                                <p class="card-text">{{ $layanan->penjelasan_1 }}</p>
                                <p class="card-text">{{ $layanan->penjelasan_2 }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!--/ Style variation -->

        </div>
    </div>
</div>
<!-- END: Content-->
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
<!--/ Edit User Modal -->
@endsection
