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
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <img src="../../../app-assets/images/elements/center.png" class="img-float" />
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Hallo !!! {{ Auth::user()->name }},</h1>
                                    <p class="card-text m-auto w-75">
                                        Anda Penyedia Layanan <strong>{{ $penyedia->nama_penyedia }}</strong> Ayo Mulai Hal Yang Luarbiasa.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->

                    <!-- Subscribers Chart Card starts -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="fw-bolder mt-1">{{ $pendaftar_butuh_verifikasi }}</h1>
                                <p class="card-text">Pendaftar butuh verifikasi anda</p>
                            </div>
                            <div class="text-center mt-1">
                            <a type="button" class="btn btn-primary" href="verifikasi_pendaftar">Lihat detail</a>
                            </div>
                        </div>
                    </div>
                    <!-- Subscribers Chart Card ends -->

                    <!-- Orders Chart Card starts -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="star" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="fw-bolder mt-1">{{ $rating }}</h1>
                                <p class="card-text">Rata Rata Rating Anda</p>
                            </div>
                        </div>
                    </div>
                    <!-- Orders Chart Card ends -->
                </div>

  <div class="row match-height">
    <div class="col-lg-4 col-12">
      <div class="row match-height">
        <!-- Bar Chart - Orders -->
        {{-- <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50">
              <h6>Orders</h6>
              <h2 class="fw-bolder mb-1">2,76k</h2>
              <div id="statistics-order-chart"></div>
            </div>
          </div>
        </div> --}}
        <!--/ Bar Chart - Orders -->

        <!-- Line Chart - Profit -->
        {{-- <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Profit</h6>
              <h2 class="fw-bolder mb-1">6,24k</h2>
              <div id="statistics-profit-chart"></div>
            </div>
          </div>
        </div> --}}
        <!--/ Line Chart - Profit -->

        <!-- Earnings Card -->
        <div class="col-lg-12 col-md-6 col-12">
          <!-- Company Table Card -->
      <div class="card card-company-table">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Nama layanan</th>
                  <th>Total pengguna</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($layanans as $layananss)
                      <tr>
                        <td>{{ $layananss->nama_singkat }}</td>
                        <?php
                        $pengguna = App\Models\Pendaftaran::select()->where('layanan_id', $layananss->id)->get()->count()
                        ?>
                        <td style="text-align: center">{{ $pengguna }}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!--/ Company Table Card -->
        </div>
        <!--/ Earnings Card -->
      </div>
    </div>

    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-8 col-12 revenue-report-wrapper">
            <div>{!! $layanan_perbulan->render() !!}</div>
          </div>
          <div class="col-md-4 col-12 budget-wrapper">
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-outline-primary budget-dropdown"
                data-bs-toggle="dropdown"
                readonly
              >
                {{ date(now()->format('d-m-Y')) }}
              </button>
            </div>
            <h2 class="mb-25">{{ $total_layanan_taunan }}</h2>
            <div class="d-flex justify-content-center">
              <span>Total pengguna layanan anda tahun ini</span>
            </div>
            <div id="budget-chart"></div>
            <a type="button" class="btn btn-primary" href="layanan">Lihat semua layanan</a>
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
  </div>

            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
