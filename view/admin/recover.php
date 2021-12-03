<?php
$alerta = strlen($alerta) ? '<div class= "alert alert-success text-center mx-3" role="alert">' . $alerta . '</div>' : '';
?>
<div class="content-wrapper d-flex flex-column  justify-content-center align-items-center">
    <?= $alerta ?>
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <div><a href="#" class="h1"><b>RICE</b>Fit <i class="fas fa-heartbeat"></i></a></div>
            </div>

            <div class="card-body">
                <!-- FORMULÁRIO -->
                <?php if ($atualizacao != true || empty($atualizacao)) : ?>
                    <p class="login-box-msg">
                        Você está a apenas um passo de sua nova senha, <b>recupere sua senha agora.</b>
                    </p>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required autocomplete="off">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block text-bold" name="btnEnviar" value="enviar">Alterar</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

                <!-- VALIDANDO ALTERAÇÃO -->
                <?php if (!empty($atualizacao) && $atualizacao == true) : ?>
                    <div class="alert alert-success" role="alert" data-aos="zoom-in" data-aos-delay="200">
                        <p class="text-lg text-bold text-center">Alteração realizada com sucesso!</p>
                    </div>

                    <a href="login.php" class="btn btn-outline-success btn-block text-bold text-lg" data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-sign-in-alt"></i> Login</a>
                <?php endif; ?>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

</div>