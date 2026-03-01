<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

        <meta charset="utf-8" />
        <title>Admin Panel - Website Aqualife Indonesia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Minimal Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('uploads/');?>images/profiles/bbbb.png">

        <!-- Layout config Js -->
        <script src="<?= base_url() ?>assets/hybrix/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/hybrix/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/hybrix/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>assets/hybrix/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?= base_url() ?>assets/hybrix/css/custom.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url(); ?>assets/hybrix/libs/select2/css/select2.min.css" rel="stylesheet" >

    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <div class="top-tagbar">
                <div class="w-100">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4 col-9">
                            <div class="text-white-50 fs-13">
                                <i class="bi bi-clock align-middle me-2"></i> <span id="current-time"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php $this->load->view('backend/components/header'); ?>

            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?= base_url('backend/home/consultation') ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="" height="26">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="" height="26">
                        </span>
                    </a>
                    <a href="<?= base_url('backend/home/consultation') ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="" height="24">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <?php $this->load->view('backend/components/sidebar'); ?>
            

                <div class="back-btn">
                    <a href="<?= base_url('backend/home/consultation') ?>" class="btn btn-primary p-0 avatar-sm rounded-circle" data-bs-toggle="tooltip" data-bs-title="Back to Dashboard">
                        <div class="avatar-title rounded-circle">
                            <i class="bi bi-house-door-fill"></i>
                        </div>
                    </a>
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <?php $this->load->view("{$filePage}") ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url(); ?>assets/hybrix/libs/jquery/jquery.min.js"></script>

        <script src="<?= base_url(); ?>assets/hybrix/libs/select2/js/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/js/plugins.js"></script>

        <!-- prismjs plugin -->
        <script src="<?= base_url() ?>assets/hybrix/libs/prismjs/prism.js"></script>

        <script src="<?= base_url() ?>assets/hybrix/js/app.js"></script>
        <!-- bootstrap icons init -->
        <script src="<?= base_url() ?>assets/hybrix/js/pages/bootstrap-icons.init.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var baseUrl = "<?= base_url(); ?>"
            var beBaseUrl = "<?= base_url(); ?>backend"
        </script>

        <?php 
            foreach($js ?? [] as $js_link) {
                echo "<script src='$js_link'></script> \r\n";
            } 
        ?>
    </body>
</html>