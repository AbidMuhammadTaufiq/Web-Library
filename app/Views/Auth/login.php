<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <link href="<?= base_url(); ?>/css/googleapis.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free-6.1.2-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" href="<?= base_url(); ?>/img/content/logo-imm.ico" type="image/png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <h2 class="pl-2 pt-2">
                                    <a href="/" class="btn btn-primary"><i class="fa-solid fa-house"></i></a>
                                </h2>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= route_to('login') ?>" method="post" class="user">
                                        <?= csrf_field() ?>

                                        <?php if ($config->validFields === ['email']) : ?>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group mb-5">
                                            <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?= lang('Auth.loginAction') ?>
                                        </button>

                                    </form>

                                    <hr>

                                    <?php if ($config->activeResetter) : ?>
                                        <div class="text-center">
                                            <a class="small" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($config->allowRegistration) : ?>
                                        <div class="text-center">
                                            <a class="small" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>