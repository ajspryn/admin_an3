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

                <!-- Basic table -->
        <section class="basic-datatable">
            <div class="content-header-left text-md-end col-md-12 col-12 d-md-block d-none">
                    <div class="mb-2 breadcrumb-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata"><i data-feather='plus'> </i><span> Tambah Data</span></button>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="datatables-basic table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Layanan</th>
                                    <th>Tanggal Layanan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Urut</th>
                                    <th>Keterangan Pendaftaran</th>
                                    <th>Status Transaksi</th>
                                    <th>Keterangan Tambahan Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftarans as $pendaftaran )
                                <tr>
                                    <td></td>
                                    <td>{{ $pendaftaran->layanan_id }}</td>
                                    <td>{{ $pendaftaran->tanggal_layanan }}</td>
                                    @if ($pendaftaran->pengguna_id)
                                        <td>{{ $pendaftaran->nama_pengguna }}</td>
                                    @else
                                        <td>{{ $pendaftaran->nama_pengguna }}</td>
                                    @endif
                                    <td>{{ $pendaftaran->no_antrian }}</td>
                                    <td>{{ $pendaftaran->keterangan_pendaftaran }}</td>
                                    <td>{{ $pendaftaran->status_transaksi }}</td>
                                    <td>{{ $pendaftaran->keterangan_tambahan_status }}</td>
                                    {{-- <td>
                                        <a href="/karyawan/{{ $pendaftar->id }}" type="button" class="btn btn-icon btn-flat-success">
                                            <span>Lihat</span>
                                        </a>
                                        <form action="/karyawan/{{ $pendaftar->id }}" method="post" class="d-inline" >
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-icon btn-flat-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')" ><span>Hapus</span></button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </section>
                <!-- Dashboard Analytics end -->
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
        <form class="row gy-1 pt-75" method="post" action="/pendaftaran">
            @csrf
            <div class="col-12 col-md-12">
              <label class="form-label" for="no_identitas">Nomor Identitas</label>
              <input
                type="number"
                id="no_identitas"
                name="nomor_identitas"
                class="form-control"
              />
            </div>
            <div class="col-12 col-md-12">
              <label class="form-label" for="pengguna_id">Nama Lengkap</label>
              <input
                type="text"
                id="pengguna_id"
                name="nama_pengguna"
                class="form-control"
              />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="no_telp">No Telepon</label>
              <input
                type="number"
                id="no_telp"
                name="no_telp"
                class="form-control"
              />
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
          name="keterangan_tambahan_status"
          class="form-control"
          value="Butuh Konfirmasi"
        />
        <input
          type="hidden"
          name="status_transaksi"
          class="form-control"
          value="Butuh Konfirmasi"
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
            value=""
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
@endsection

