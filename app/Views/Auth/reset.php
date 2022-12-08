<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <link href="<?= base_url(); ?>/css/googleapis.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" href="<?= base_url(); ?>/img/content/logo-imm.ico" type="image/png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.resetYourPassword') ?></h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <p><?= lang('Auth.enterCodeEmailPassword') ?></p>

                                    <form action="<?= route_to('reset-password') ?>" method="post" class="user">
                                        <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.token') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" name="pass_confirm">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.pass_confirm') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?= lang('Auth.resetPassword') ?>
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= route_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>