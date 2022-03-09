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
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($range as $rdate)
                                <tr>
                                    <td>{{ $nama_layanan->nama_singkat }}
                                        <input type="hidden" name="data[{{ $loop->iteration }}][layanan_id]" value="{{ $nama_layanan->id }}" />
                                        <input type="hidden" name="data[{{ $loop->iteration }}][penyedia_layanan_id]" value="{{ $nama_layanan->penyedia_layanan_id }}" />
                                    </td>
                                    <td>{{ $rdate->format("Y-m-d") }}
                                        <input type="hidden" value="{{ $rdate->format("Y-m-d") }}" name="data[{{ $loop->iteration }}][tanggal_layanan]" />
                                    </td>
                                    <?php $data = App\Models\Ketersediaan::select()->where('tanggal_layanan', $rdate)->where('layanan_id', $nama_layanan->id)->get()->first()?>
                                    <td><input type="number"@if ($data)
                                                                value="{{ $data->jumlah_tersedia }}"
                                                            @else
                                                                value="0"
                                                            @endif name="data[{{ $loop->iteration }}][jumlah_tersedia]"/>
                                    </td>
                                    <td>
                                        <select class="form-select" name="data[{{ $loop->iteration }}][verifikasi]" >
                                            @if ($data)
                                                @if (old('data[{{ $loop->iteration }}][verifikasi]' , $data->verifikasi) == 'K')
                                                <option value="O">Otomatis</option>
                                                <option value="K" selected>Butuh konfirmasi</option>
                                                @else
                                                <option value="O">Otomatis</option>
                                                <option value="K">Butuh konfirmasi</option>
                                                @endif
                                            @else
                                                <option value="O">Otomatis</option>
                                                <option value="K">Butuh konfirmasi</option>
                                            @endif

                                        </select>
                                    </td>
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

@endsection
