<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo site_url('assets/bootswatch/docs/_assets/img/logo.svg'); ?>" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        .active {
            text-shadow: 2px 2px 4px rgba(20, 30, 117, 0.5); /* Add text shadow nav-aktif */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SIProyek!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $active_menu == 'home' ? 'active' : ''; ?>" href="<?= site_url('home') ?>">Home</a>
                    </li>
                    <!-- Additional navbar items can be added here -->
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Auth/Logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5 mb-5">
    <!-- Page content begins here -->
    <script src="<?= base_url('assets/bootswatch/docs/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>

