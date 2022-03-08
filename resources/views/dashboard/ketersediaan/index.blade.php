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
                        <h2 class="content-header-title float-start mb-0">Ketersediaan Layanan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Menu Utama
                                </li>
                                <li class="breadcrumb-item"><a href="/ketersediaan">Ketersediaan</a>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pilih Layanan Dan Waktu Ketersediaan</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="/ketersediaan" >
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Layanan</label>
                                                    <select class="form-select" aria-label="Default select example" value="{{ request('layanan_id') }}" name="layanan_id" required >
                                                        @foreach ($layanans as $layanan )
                                                        <option value="{{ $layanan->id }}">{{ $layanan->nama_singkat }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <label class="form-label" for="fp-default">Waktu Awal</label>
                                                <input type="text" id="fp-default" name="waktu_awal" class="form-control flatpickr-basic" value="{{ request('waktu_awal') }}" />
                                            </div>
                                            <div class="col-md-3 mb-1">
                                                <label class="form-label" for="fp-default">Waktu Akhir</label>
                                                <input type="text" id="fp-default" name="waktu_akhir" class="form-control flatpickr-basic" value="{{ request('waktu_akhir') }}" />
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

                @if (request('layanan_id')!="")

<!-- Basic multiple Column Form section start -->
{{-- <section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multiple Column</h4>
        </div>
        <div class="card-body">
            <form class="form" method="POST" action="/ketersediaan">
                @csrf
                <div class="row">
                @foreach ($range as $rdate)
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <label class="form-label" for="first-name-column">Layanan</label>
                  <input
                    type="text"
                    id="first-name-column"
                    class="form-control"
                    name="layanan"
                    @foreach ($nama_layanan as $nama)
                    value="{{ $nama->nama_singkat }}"
                    @endforeach
                    disabled
                  />
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <label class="form-label" for="last-name-column">Tanggal</label>
                  <input
                    type="text"
                    id="last-name-column"
                    class="form-control"
                    name="tanggal{{ $rdate->format("Y-m-d") }}"
                    value="{{ $rdate->format("Y-m-d") }}"
                    disabled
                  />
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city-column">Ketersediaan</label>
                  <input type="number" id="city-column" class="form-control" name="ketersediaan{{ $rdate->format("Y-m-d")}}" value="0" />
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city-column">Terpakai</label>
                  <input type="text" id="city-column" class="form-control" disabled />
                </div>
              </div>
              @endforeach
              <div class="d-flex justify-content-between">
                  <button type="reset" class="btn btn-outline-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary me-1">Submit</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!-- Basic Floating Label Form section end -->

                <!-- Project table -->
                <form method="POST" action="/ketersediaan">
                    @csrf
                <div class="card">
                    <h4 class="card-header">Ketersediaan Layanan</h4>
                    <div class="table-responsive">
                        <table class="table datatable-project">
                            <thead>
                                <thead>
                                    <th>Layanan</th>
                                    <th>Tanggal</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @for ($i=0;$i<$jumlah;$i++)
                                @endfor --}}
                                @foreach ($range as $rdate)
                                <tr>
                                    <td>{{ $nama_layanan->nama_singkat }}
                                        <input type="hidden" name="data[{{ $loop->iteration }}][layanan_id]" value="{{ $nama_layanan->id }}" />
                                        <input type="hidden" name="data[{{ $loop->iteration }}][penyedia_layanan_id]" value="{{ $nama_layanan->penyedia_layanan_id }}" />
                                    </td>
                                    <td>{{ $rdate->format("Y-m-d") }}
                                        <input type="hidden" value="{{ $rdate->format("Y-m-d") }}" name="data[{{ $loop->iteration }}][tanggal_layanan]" />
                                    </td>
                                    <?php $data = App\Models\Ketersediaan::select('jumlah_tersedia')->where('tanggal_layanan', $rdate)->where('layanan_id', $nama_layanan->id)->get()->first()?>
                                    <td><input type="number"@if ($data)
                                                                value="{{ $data->jumlah_tersedia }}"
                                                            @else
                                                                value="0"
                                                            @endif name="data[{{ $loop->iteration }}][jumlah_tersedia]"/></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <a></a>
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                        </div>
                        <br>
                    </div>
                </form>
                <!-- /Project table -->
                @else

                @endif

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- Solid -->
<!--/ Style variation -->
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
                <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="ketersediaan">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="layanan_id">Layanan ID</label>
                        <select class="form-select" id="layanan_id" name="layanan_id">
                            <option>Pilih Layanan</option>
                            @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->id }}">{{ $layanan->nama_singkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="tanggal_layanan">Tanggal_Layanan</label>
                        <input
                        type="date"
                        id="tanggal_layanan"
                        name="tanggal_layanan"
                        class="form-control flatpickr-basic"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="jumlah_tersedia">Jumlah Tersedia</label>
                        <input
                        type="number"
                        id="jumlah_tersedia"
                        name="jumlah_tersedia"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="jumlah_terambil">Jumlah Terambil</label>
                        <input
                        type="number"
                        id="jumlah_terambil"
                        name="jumlah_terambil"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="jumlah_pembatalan">Jumlah Pembatalan</label>
                        <input
                        type="number"
                        id="jumlah_pembatalan"
                        name="jumlah_pembatalan"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="keterangan_ketersediaan">Keterangan Ketersediaan</label>
                        <input
                        type="text"
                        id="keterangan_ketersediaan"
                        name="keterangan_ketersediaan"
                        class="form-control"
                        />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="nomor_urut">Nomor Urut</label>
                        <input
                        type="number"
                        id="nomor_urut"
                        name="nomor_urut"
                        class="form-control"
                        />
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
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

@endsection
