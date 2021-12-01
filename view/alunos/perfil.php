<?php

use App\Controller\Geral; // mascara
$alerta  = strlen($alerta)  ? '<div class= "alert alert-warning text-bold m-1">' . $alerta . '</div>' : '';
$alertaArquivo   = strlen($alertaArquivo)  ? '<div class= "alert alert-warning text-bold m-1">' . $alertaArquivo . '</div>' : '';
?>
<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Alteração realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-lg btn-outline-light text-bold">Ok <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Perfil <span class="text-success text-bold"><i class="fas fa-user-circle"></i></span></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="row d-flex justify-content-center ">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="card card-outline card-success d-flex flex-fill">

                            <div class="card-header border-bottom-0 text-success text-lg text-bold">
                                Detalhes
                            </div>
                            <?= $alerta ?>
                            <?= $alertaArquivo ?>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 text-center mt-5">
                                        <?php if (!empty($inputs[0]['anexo'])) : ?>
                                            <img src="../admin/arquivos/alunos/<?= $inputs[0]['anexo'] ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 15rem;">
                                        <?php else : ?>
                                            <img src="../admin/arquivos/alunos/padrao/padrao.png" alt="user-avatar" class="img-circle img-fluid" style="width: 15rem;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-8 col-md-12  mt-5">

                                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <label class="text-success text-bold">Nome:</label>
                                                    <input class="form-control form-control-lg text-bold" type="text" name="nome" value="<?= $inputs[0]['nome'] ?>">
                                                </div>

                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <label class="text-success text-bold">E-mail:</label>
                                                    <input class="form-control form-control-lg text-bold" type="text" name="email" value="<?= $inputs[0]['email'] ?>">
                                                </div>

                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <label class="text-success text-bold">Celular:</label>
                                                    <input class="form-control form-control-lg text-bold" type="text" name="celular" data-js="phone" value="<?php echo Geral::mask($inputs[0]['celular'], '(##) #.####-####'); ?>">
                                                </div>

                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <label class="text-success text-bold">Senha:</label>
                                                    <input class="form-control form-control-lg text-bold" type="password" name="senha">
                                                </div>

                                                <div class="col-lg-12 col-md-12 mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="arquivo" placeholder="aaaa" id="customFile" accept="image/*">
                                                        <label class="custom-file-label text-bold" for="customFile">IMAGEM</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 mb-3">
                                                    <div class="callout callout-success">
                                                        <h5 class="text-bold text-success">Formatos Permitidos:</h5>
                                                        <p>PNG, JPG, JPEG, SVG <i class="far fa-images ml-2"></i></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success" name="btnSalvar" value="salvar"><i class="fas fa-edit"></i> Editar Informações</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>