<head>
    <title><?php echo $title; ?></title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="<?php echo base_url() ?>Asset/Css/top-fixed-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>Asset/Css/jquery.dataTables.min.css">
    <script src="<?php echo base_url() ?>Asset/Js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="<?php echo base_url() ?>Asset/Js/global.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url() ?>home">SPK Pemilihan Calon Karyawan</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleCenteredNav" aria-controls="navbarsExampleCenteredNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-collapse justify-content-md-end" id="navbarsExampleCenteredNav">
                <ul class="navbar-nav">
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kriteria</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="<?php echo base_url() ?>kriteria">Kriteria</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>kriteriaahp/form/add">Form Nilai Kriteria</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Calon Karyawan</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="<?php echo base_url() ?>calonkaryawan">Calon Karyawan</a>
                            <a class="dropdown-item" href="<?php echo base_url() ?>alternatifmp">Nilai Calon Karyawan</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() ?>hasilperangkingan">Hasil Perangkingan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() ?>user">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>login/keluar">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>