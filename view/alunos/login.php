<?php $alertaLogin = strlen($alertaLogin) ? '<div class= "alert alert-danger">' . $alertaLogin . '</div>' : ''; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="admin/img/short.png">
    <title>riceFit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="b4/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="b4/dist/css/adminlte.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="b4/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="estilos/css/styleLogin.css">
</head>

<body class="hold-transition login-page">
    <div class="d-flex justify-content-center align-items-center" id="fit">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <div><a href="admin/login.php" class="h1"><b>RICE</b>Fit <i class="fas fa-heartbeat"></i></a></div>
                    <div class="text-center text-success">Área do Aluno.</div>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Faça login para iniciar sua Sessão</p>
                    <?= $alertaLogin ?>
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="senha" placeholder="Senha">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" name="btnEntrar" value="entrar" class="btn btn-success btn-block">Entrar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <div class="mt-2 mx-1">
                            <p>
                                <a href="public/forgot.php">Recuperar Senha</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="admin/login.php" class="btn btn-light text-success text-bold">Área administrativa</a>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="b4/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="b4/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="b4/dist/js/adminlte.min.js"></script>
</body>

</html>