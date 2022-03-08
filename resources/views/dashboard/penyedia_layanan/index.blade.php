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
                        <h2 class="content-header-title float-start mb-0">Profile Layanan Anda</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Menu Utama
                                </li>
                                <li class="breadcrumb-item"><a href="/pengguna_layanan">Penyedia Layanan</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($penyedia_layanans)

            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                        <!-- User Card -->
                        @foreach ($penyedia_layanans as $penyedia_layanan)
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        @if ($penyedia_layanan->foto)
                                        <img
                                        class="img-fluid rounded mt-3 mb-2"
                                        src="{{ asset('storage/'.$penyedia_layanan->foto) }}"
                                        height="110"
                                        width="110"
                                        alt="User avatar"
                                        />
                                        @else
                                        <img
                                        class="img-fluid rounded mt-3 mb-2"
                                        src="/app-assets/images/logoan3.png"
                                        height="110"
                                        width="110"
                                        alt="User avatar"
                                        />
                                        @endif
                                        <div class="user-info text-center">
                                            <h4>{{ $penyedia_layanan->nama_penyedia }}</h4>
                                            <span class="badge bg-light-secondary">{{ $penyedia_layanan->kegiatan_usaha }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around my-2 pt-75">
                                    <div class="d-flex align-items-start me-2">
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Alamat : </span>
                                            <span>{{ $penyedia_layanan->alamat_1 }}, {{ $penyedia_layanan->alamat_2 }}, {{ $penyedia_layanan->alamat_3 }}, {{ $penyedia_layanan->alamat_4 }}, {{ $penyedia_layanan->alamat_kodepos }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">No Telepon : </span>
                                            <span class="badge bg-light-success">{{ $penyedia_layanan->no_telp }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Nama Kontak : </span>
                                            <span>{{ $penyedia_layanan->nama_kontak }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">No Hp : </span>
                                            <span class="badge bg-light-success">{{ $penyedia_layanan->no_hp }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Alamat Email : </span>
                                            <span>{{ $penyedia_layanan->alamat_email }}</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center pt-2">
                                        <a href="javascript:;" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#edituser" data-bs-toggle="modal">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- Project table -->
                        <div class="card">
                            <h4 class="card-header">Daftar Layanan Anda</h4>
                            <div class="table-responsive">
                                <table class="table datatable-project">
                                    <thead>
                                        <tr>
                                            <th>Nama Layanan</th>
                                            <th>Penjelasan</th>
                                            <th>Penjelasan Lanjutan</th>
                                        </tr>
                                    </thead>
                                    @foreach ($layanans as $layanan)
                                    <tbody>
                                        <tr>
                                            <td>{{ $layanan->nama_singkat }}</td>
                                            <td>{{ $layanan->penjelasan_1 }}</td>
                                            <td>{{ $layanan->penjelasan_2 }}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- /Project table -->
                    </div>
                    <!--/ User Content -->
                </div>
            </section>

            @else

            <!-- pricing plan cards -->
            <div class="row pricing-card">
                <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
                    <div class="row">

                        <!-- standard plan -->
                        <div class="col-12 col-md-12">
                            <div class="card standard-pricing popular text-center">
                                <div class="card-body">
                                    <img src="../../../app-assets/images/illustration/Pot2.svg" class="mb-1" alt="svg img" />
                                    <h3>Hallo !!!</h3>
                                    <p class="card-text">{{ Auth::user()->name }}</p>
                                    <div class="annual-plan">
                                        <div class="plan-price mt-2">
                                            <sub class="pricing-duration text-body font-medium-1 fw-bold">Silahkan Lengkapi Data Pelayanan Anda</sub>
                                        </div>
                                        <small class="annual-pricing d-none text-muted"></small>
                                    </div>
                                    <button class="btn w-100 btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#tambahdata">Lengkapi Data</button>
                                </div>
                            </div>
                        </div>
                        <!--/ standard plan -->

                    </div>
                </div>
            </div>
            <!--/ pricing plan cards -->

            @endif

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Edit User Modal -->
<div class="modal fade" id="edituser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Ubah Detail Penyedia Layanan</h1>
                    <p></p>
                </div>
                @foreach ($penyedia_layanans as $penyedia_layanan)
                <form class="row gy-1 pt-75" method="POST" action="/penyedia_layanan/{{ $penyedia_layanan->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="nama">Nama Penyedia</label>
                        <input
                        type="text"
                        id="nama"
                        name="nama_penyedia"
                        class="form-control"
                        value="{{ $penyedia_layanan->nama_penyedia }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="alamat_1">Alamat</label>
                        <input
                        type="text"
                        id="alamat_1"
                        name="alamat_1"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_1 }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="alamat_2">Provinsi</label>
                        <input
                        type="text"
                        id="alamat_2"
                        name="alamat_2"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_2 }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="alamat_3">Kabupaten/Kota</label>
                        <input
                        type="text"
                        id="alamat_3"
                        name="alamat_3"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_3 }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="alamat_4">Kecamatan</label>
                        <input
                        type="text"
                        id="alamat_4"
                        name="alamat_4"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_4 }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="kode_pos">Kode Pos</label>
                        <input
                        type="number"
                        id="kode_pos"
                        name="alamat_kodepos"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_kodepos }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="no_telp">Nomor Telepon</label>
                        <input
                        type="number"
                        id="no_telp"
                        name="no_telp"
                        class="form-control"
                        value="{{ $penyedia_layanan->no_telp }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="nama_kontak">Nama Kontak</label>
                        <input
                        type="text"
                        id="nama_kontak"
                        name="nama_kontak"
                        class="form-control"
                        value="{{ $penyedia_layanan->nama_kontak }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="alamat_email">Alamat Email</label>
                        <input
                        type="text"
                        id="alamat_email"
                        name="alamat_email"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_email }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="no_hp">Nomor Hp</label>
                        <input
                        type="number"
                        id="no_hp"
                        name="no_hp"
                        class="form-control"
                        value="{{ $penyedia_layanan->no_hp }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="kegiatan_usaha">Kegiatan Usaha</label>
                        <input
                        type="text"
                        id="kegiatan_usaha"
                        name="kegiatan_usaha"
                        class="form-control"
                        value="{{ $penyedia_layanan->kegiatan_usaha }}"
                        required
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="alamat_web">Alamat Web</label>
                        <input
                        type="text"
                        id="alamat_web"
                        name="alamat_web"
                        class="form-control"
                        value="{{ $penyedia_layanan->alamat_web }}"
                        required
                        />
                    </div>
                    <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                        <label for="formFile" class="form-label">Upload Foto</label>
                        <input class="form-control" type="file" id="formFile" name="foto" value="{{ $penyedia_layanan->foto }}"/>
                    </div>

                    <input
                    type="hidden"
                    name="user_id"
                    class="form-control"
                    value="{{ Auth::user()->id }}"
                    />

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

<script>
    $(function () {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function (){
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();

                console.log(id_provinsi);
                $.ajax({
                    type : 'post',
                    url : "{{ route('getkabupaten') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,

                    success : function(msg){
                        $('kabupaten').html(msg);
                    },
                    error : function(data){
                        console.log('error:',data)
                    }
                })
            })
        })
    });
</script>
@endsection
