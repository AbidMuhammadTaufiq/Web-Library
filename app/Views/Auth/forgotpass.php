<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><?= lang('Auth.forgotPassword') ?></h1>

                                        <?= view('Myth\Auth\Views\_message_block') ?>

                                        <p><?= lang('Auth.enterEmailForInstructions') ?></p>
                                    </div>
                                    <form action="<?= route_to('forgot') ?>" method="post" class="user">
                                        <?= csrf_field() ?>

                                        <div class="form-group mt-4">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?= lang('Auth.sendInstructions') ?>
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                                    </div>
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
    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>