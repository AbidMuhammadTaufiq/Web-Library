<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/css/bootstrap.min.css">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <!-- favicon -->
    <link rel="icon" href="<?= base_url(); ?>/img/content/logo-imm.ico" type="image/png">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/owl.theme.default.min.css">

    <!-- tables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/dataTables.bootstrap5.min.css">


    <title><?= $title; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/img/logo-imm.png" alt="" width="50" class="">
            </a>
            <a class="navbar-brand" href="/">
                <b>Perpustakaan</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse h6" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/bukuindex">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/resensiindex">Resensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/peminjamanindex">Peminjaman</a>
                    </li>
                    <li class="nav item">
                        <a class="btn btn-primary btn-sm" title="Login Admin" href="/Auth/login"><i class="bi bi-person-fill"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>