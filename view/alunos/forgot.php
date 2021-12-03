<?php
$alerta = strlen($alerta) ? '<div class= "alert alert-success text-center mx-3" role="alert">' . $alerta . '</div>' : '';
?>
<div class="content-wrapper d-flex flex-column  justify-content-center align-items-center">
    <?= $alerta ?>
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <div><a href="../index.php" class="h1"><b>RICE</b>Fit <i class="fas fa-heartbeat"></i></a></div>
            </div>

            <div class="card-body">
                <p class="login-box-msg">
                    Você esqueceu sua senha?<br> Aqui você pode facilmente <b>recupera-la.</b>
                </p>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block text-bold" name="btnEnviar" value="enviar">Solicitar nova senha</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="../index.php" class="btn btn-sm btn-success text-bold"><u>Login</u></a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>







</div>