<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Cadastro realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="listaExercicios.php" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
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
                    <h1><b>Exercícios</b><i class="fas fa-dumbbell text-success ml-2"></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
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
                    <div class="card-header row">
                        <div class="col-auto ml-auto">
                            <a href="listaExercicios.php" class="btn btn-lg btn-success">Listagem <i class="fas fa-list-ul"></i></a>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['arquivo']) && !empty($_SESSION['arquivo'])) { ?>
                        <div class="alert alert-warning m-1 " role="alert"><?php echo $_SESSION['arquivo']; ?></div>
                    <?php
                        unset($_SESSION['arquivo']);
                    } ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="nome" placeholder="Nome do Exercício" required autocomplete="off" <?php if (isset($_SESSION['value_nome']) && !empty($_SESSION['value_nome'])) {
                                                                                                                                                                                echo "value='" . $_SESSION['value_nome'] . "'";
                                                                                                                                                                                unset($_SESSION['value_nome']);
                                                                                                                                                                            } ?>>
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="arquivo" id="customFile" required >
                                                <label class="custom-file-label" for="customFile"><i class="fas fa-photo-video"></i></label>
                                            </div>
                                            <b><span>Formatos: Videos, Imagens</span><i class="fas fa-photo-video ml-2"></i></b>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mb-3">
                                            <textarea name="descricao" id="summernote" cols="30" rows="10" required>
                                            <?php if (isset($_SESSION['value_narrativa']) && !empty($_SESSION['value_narrativa'])) {
                                                echo  $_SESSION['value_narrativa'];
                                                unset($_SESSION['value_narrativa']);
                                            } ?>
                                            </textarea>
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