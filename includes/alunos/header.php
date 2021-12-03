<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../admin/img/short.png">
    <title>riceFit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../b4/plugins/fontawesome-free/css/all.min.css">
    <!-- gligthbox -->
    <link href="../b4/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">
    <!-- Calendario CSS-->
    <link href='../plugins/calendario/lib/main.css' rel='stylesheet'>
    <!-- Calendario JS-->
    <script src='../plugins/calendario/lib/main.js'></script>
    <script src='../plugins/calendario/lib/locales/pt-br.js'></script>
    <script src="../plugins/calendario/js/script.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/dataTable/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/dataTable/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/dataTable/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style DataTables-->
    <link rel="stylesheet" href="../plugins/dataTable/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../b4/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="home.php" class="navbar-brand">
                    <span class="text-success text-bold">riceFit</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="home.php" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="avaliacoes.php" class="nav-link">Avaliações</a>
                        </li>

                        <li class="nav-item">
                            <a href="perfil.php" class="nav-link">Perfil</a>
                        </li>

                    </ul>

                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger text-bold" data-toggle="modal" data-target="#modalSair">
                                <i class="fas fa-sign-out-alt"></i>
                                sair
                            </button>
                        </li>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->