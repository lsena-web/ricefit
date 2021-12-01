<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>riceFit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../b4/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../b4/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../b4/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../b4/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../b4/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../b4/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- gligthbox -->
    <link href="../b4/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../b4/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../b4/plugins/summernote/summernote-bs4.min.css">
    <!-- estilo do calendario -->
    <link rel="stylesheet" href="../b4/plugins/calendario/lib/main.css">
    <!-- configs do calendario -->
    <script src='../b4/plugins/calendario/lib/main.js'></script>
    <script src='../b4/plugins/calendario/lib/locales/pt-br.js'></script>
    <script src="../b4/plugins/calendario/js/script.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="../b4/dist/css/adminlte.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../estilosAdmin/css/style.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/logoRice.jpeg" alt="logo Ricefit" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link btn btn-success" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger text-bold" data-toggle="modal" data-target="#modalSair">
                        <i class="fas fa-sign-out-alt"></i>
                        sair
                    </button>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->