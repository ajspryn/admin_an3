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
                                <h1 class="fw-bolder mt-1">{{ $layanan }}</h1>
                                <p class="card-text">Kali Layanan Anda Digunakan</p>
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
                </div>

            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
