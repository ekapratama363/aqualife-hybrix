<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    
<!-- Mirrored from themesbrand.com/hybrix/html/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 04:23:47 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Admin Panel - Website Aqualife Indonesia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Minimal Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/hybrix/images/favicon.ico">

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

    </head>

    <body>

        <section class="auth-bg-cover min-vh-100 p-4 p-lg-5 d-flex align-items-center justify-content-center">
            <div class="bg-overlay"></div>
            <div class="container-fluid px-0">
                <div class="row g-0">
                    <div class="col-xl-8 col-lg-6">
                        <div class="h-100 mb-0 p-4 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    
                                </div>
                            </div>

                            <div class="text-white mt-4">
                                <p class="mb-0">&copy;
                                    <script>document.write(new Date().getFullYear())</script> Aqualife Indonesia.
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-xl-4 col-lg-6">
                        <div class="card mb-0 py-5">
                        
                            <div class="card-body p-4 p-sm-5 m-lg-2">
                                <div class="text-center mt-2">
                                    <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="" height="45" />
                                    <p class="text-muted">Sign in to Admin Panel.</p>

                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <p class="text-white">
                                                <?= validation_errors(); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('error') != NULL) : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <p class="text-black"><?= $this->session->flashdata('error') ?></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="p-2 mt-5">

                                    <?= form_open('backend/auth/auth_login'); ?>
                            
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                        
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                            </div>
                                        </div>
                        
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>
                    
                                    <?= form_close(); ?>
                        
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end conatiner-->
        </section>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/hybrix/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="<?= base_url() ?>assets/hybrix/js/plugins.js"></script>

        <script src="<?= base_url() ?>assets/hybrix/js/pages/password-addon.init.js"></script>

    </body>


<!-- Mirrored from themesbrand.com/hybrix/html/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 04:23:47 GMT -->
</html>