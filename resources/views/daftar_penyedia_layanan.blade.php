<!DOCTYPE html>
<html class="loading" lang="id" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <title>Daftarkan Pengguna Layanan</title>
        <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
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
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-wizard.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body"><div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="#">
                            <img src="/app-assets/images/logoan3.png" height="80px"></span>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img
                                class="img-fluid w-100"
                                src="../../../app-assets/images/illustration/create-account.svg"
                                alt="multi-steps"
                                />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                            <div class="width-700 mx-auto">
                                <div class="bs-stepper register-multi-steps-wizard shadow-none">
                                    <div class="bs-stepper-content px-0 mt-4">
                                        <div>
                                            <h2>Form data Penyedia layanan</h2>
                                            <p>Silahkan isi data Penyedia layanan Terlebih dahulu</p>
                                        </div>
                                        <form class="row gy-1 pt-75" method="POST" action="penyedia_layanan" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12 col-md-12">
                                                <label class="form-label" for="nama">Nama Penyedia</label>
                                                <input
                                                type="text"
                                                id="nama"
                                                name="nama_penyedia"
                                                class="form-control"
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
                                                />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                                <label for="formFile" class="form-label">Upload Foto</label>
                                                <input class="form-control" type="file" id="formFile" name="foto" />
                                            </div>

                                            <input
                                            type="hidden"
                                            name="user_id"
                                            class="form-control"
                                            value="{{ Auth::user()->id }}"
                                            />

                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.min.js"></script>
<script src="../../../app-assets/js/core/app.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/auth-register.min.js"></script>
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

  =
