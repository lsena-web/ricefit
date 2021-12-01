<?php
$alertaEmail     = strlen($alertaEmail)    ? '<div class= "alert alert-danger text-bold m-1">' . $alertaEmail . '</div>' : '';
$alertaArquivo   = strlen($alertaArquivo)  ? '<div class= "alert alert-warning text-bold m-1">' . $alertaArquivo . '</div>' : '';
?>
<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Cadastro realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="listaAlunos.php" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Alunos</b><i class="fas fa-user-friends text-success ml-2"></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Alunos</li>
                        <li class="breadcrumb-item active">Cadastro</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto ml-auto">
                                <a href="listaAlunos.php" class="btn btn-lg btn-success">Listagem <i class="fas fa-list-ul"></i></a>
                            </div>
                        </div>
                    </div>

                    <?= $alertaArquivo ?>
                    <?= $alertaEmail ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="nome" placeholder="Nome" required autocomplete="off" value="<?= $inputNome ?>">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="celular" minlength="11" placeholder="Celular" required autocomplete="off" data-js="phone" value="<?= $inputCelular ?>">
                                        </div>

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="email" placeholder="E-mail" required autocomplete="off" value="<?= $inputEmail ?>">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="password" name="senha" minlength="8" placeholder="Senha" required autocomplete="off" value="<?= $inputSenha ?>">
                                        </div>

                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <select class="custom-select custom-select-lg " name="sexo" required>
                                                <option selected disabled value="">selecione o sexo</option>
                                                <option value="m">Masculino</option>
                                                <option value="f">Feminio</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <select class="custom-select custom-select-lg " name="turma" required>
                                                <option selected disabled value="">selecione a turma</option>
                                                <?php if (isset($gp)) {
                                                    foreach ($gp as $v) { ?>
                                                        <option value="<?php echo $v['nome']; ?>"><?php echo $v['nome']; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="arquivo" id="customFile" accept="image/*">
                                                <label class="custom-file-label text-bold" for="customFile">IMAGEM</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="callout callout-success">
                                                <h5 class="text-bold text-success">Formatos Permitidos:</h5>
                                                <p>PNG, JPG, JPEG, SVG <i class="far fa-images ml-2"></i></p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-3">
                                            <textarea name="descricao" id="summernote2" cols="30" rows="10" required><?= $inputDescricao ?></textarea>
                                            <b>Descrição <i class="fas fa-edit"></i></b>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" value="salvar" name="btnSalvar" class="col-lg-4 col-md-6 btn btn-success">Salvar</button>
                            </div>
                    </form>

                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->

        <!-- ./row -->
    </section>
</div>
<!-- /.content-wrapper -->