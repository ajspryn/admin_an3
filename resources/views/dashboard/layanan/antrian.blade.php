
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Antrian - An3</title>
    <link rel="apple-touch-icon" href="/app-assets/images/logoan3.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/logoan3.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/charts/chart-apex.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav bookmark-icons">
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/layanan" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kembali Ke Dashboard Layanan"> <i class="ficon" data-feather='arrow-left-circle'></i></a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
        </ul>
      </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">

  <div class="row match-height">

    <!-- Developer Meetup Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-developer-meetup">
        <div class="meetup-img-wrapper rounded-top text-center">
            <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
        </div>
        @if ($antrian)
            <div class="card-body">
          <div class="mt-0">
            <div class="more-info">
                <h4 style="text-align: center">Antrian Saat Ini</h4>
              <h1 class="mb-75 mt-2 pt-80 text-center" style="text-align: center">{{ $antrian->no_antrian }}</h1>
            </div>
          </div>
          <div class="mt-0">
            <div class="more-info">
                <h4 style="text-align: center">{{ $antrian->nama_pengguna }}</h4>
                <p style="text-align: center">{{ $antrian->pengguna->alamat_email }}</p>
              <h6 style="text-align: center" >Jam : {{ date('h:i') }}</h6>
            </div>
          </div>
          <div>
              <form method="POST" action="/pendaftaran/{{ $antrian->id }}">
                @csrf
                @method('put')
                <input type="hidden" name="keterangan_tambahan_status" value="Sudah Selesai"/>
                <input type="hidden" name="status_transaksi" value="Selesai"/>
                <button type="submit" class="btn btn-success w-100">Antrian Berikutnya</button>
              </form>
        </div>
        </div>
        @else
            <div class="card-body">
          <div class="mt-0">
            <div class="more-info">
                <h4 style="text-align: center">Antrian Saat Ini</h4>
              <h1 class="mb-75 mt-2 pt-80 text-center" style="text-align: center">0</h1>
            </div>
          </div>
          <div class="mt-0">
            <div class="more-info">
                <h4 style="text-align: center">Belum Ada Yang Mendaftar Dilayanan {{ $layanan->nama_singkat }}</h4>
                <p style="text-align: center"></p>
              <h6 style="text-align: center" >Jam : {{ date('h:i') }}</h6>
            </div>
          </div>
          <a href="/layanan" class="btn btn-success w-100">Kembali Ke Dashboard Layanan</a>
        </div>
        @endif
      </div>
    </div>
    <!--/ Developer Meetup Card -->

    <!-- Company Table Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-company-table">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th style="text-align: center">No Antrian</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pendaftar as $no_urut)
                <tr>
                    <td style="text-align: center">{{ $no_urut->no_antrian }}</td>
                    <td>{{ $no_urut->nama_pengguna }}</td>
                    <td>{{ $no_urut->pengguna->alamat_email }}</td>
                    <td>{{ $no_urut->pengguna->alamat_1 }}, {{ $no_urut->pengguna->alamat_2 }}, {{ $no_urut->pengguna->alamat_3 }}, {{ $no_urut->pengguna->alamat_4 }}, {{ $no_urut->pengguna->alamat_kodepos }}</td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/ Company Table Card -->
  </div>
</section>
<!-- Dashboard Ecommerce ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a> IDEVELOPE</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block"><i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>
