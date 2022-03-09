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
                        <h2 class="content-header-title float-start mb-0">Daftar Layanan Anda</h2>
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
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-2 breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata"><i data-feather='plus'> </i><span> Tambah Layanan</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="card-style-variation">
                {{-- <h2 class="mb-2">Style Variation</h2> --}}
                <!-- Solid -->
                <div class="row">
                    @foreach ($layanans as $layanan)
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="card-title text-white" style="text-align: center" >{{ $layanan->nama_singkat }}</h4>
                                    <p class="card-text" style="text-align: center">Antrian Hari Ini</p>
                                    <?php $data = App\Models\Pendaftaran::select()->where('layanan_id', $layanan->id)->where('tanggal_layanan', date(now()->format('Y-m-d')))->where('keterangan_tambahan_status', "Butuh Konfirmasi")->get() ?>
                                    @if ($data)
                                    <h1 class="text-white" style="text-align: center">{{ $data->count() }}</h1>
                                    @else
                                    <h1 class="text-white" style="text-align: center">0</h1>
                                    @endif
                                    {{-- <div class="font-small-2" style="text-align: center">{{ App\Models\Pendaftaran::select()->where('layanan_id', $layanan->id)->where('tanggal_layanan', date(now()->format('Y-m-d')))->where('keterangan_tambahan_status', "Butuh Konfirmasi")->get() }}</div> --}}
                                    <div class="font-small-2" style="text-align: center">{{ $layanan->penjelasan_1 }}</div>
                                    <div class="font-small-2" style="text-align: center">{{ $layanan->penjelasan_2 }}</div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 col-xl-8">
                                            <a type="button" href="/layanan/{{ $layanan->id }}" class="btn btn-success w-100">Lihat Antrian</a>
                                        </div>
                                        <div class="col-md-12 col-xl-2">
                                            <a type="button" class="btn btn-icon btn-warning" href="/layanan/{{ $layanan->id }}/edit" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-12 col-xl-2">
                                            <form method="POST" action="/layanan/{{ $layanan->id }}">
                                                @method("delete")
                                                @csrf
                                                <button type="submit" class="btn btn-icon btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus layanan {{ $layanan->nama_singkat }} ?')">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

{{-- <!-- edit layanan -->
<div class="modal fade" id="editdata" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Ubah data layanan</h1>
                    <p></p>
                </div>
                <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="/layanan/{{ $layanan->id }}">
                    @method("put")
                    @csrf
                    <div class="col-12 col-md-6">
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
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ edit layanan --> --}}
@endsection
