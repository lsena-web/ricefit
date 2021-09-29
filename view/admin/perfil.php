<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Alteração realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-lg btn-outline-light text-bold">Ok <i class="fas fa-stream"></i></a>
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
                    <h1><b>Perfil</b><i class="fas fa-user text-success ml-2"></i></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header row justify-content-end">
                        <div class="col-auto">
                            <h3 class="card-title">
                                <b>Atualização</b><i class="fas fa-edit text-success ml-2" style="font-size:25px;"></i></a>
                            </h3>
                        </div>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">

                                        <input type="hidden" name="id" value="<?php echo $inputs[0]['id']; ?>">

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="nome" placeholder="NOME" required autocomplete="off" value="<?php echo $inputs[0]['nome']; ?>">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="login" placeholder="LOGIN" required autocomplete="off" value="<?php echo $inputs[0]['login']; ?>">
                                        </div>

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="email" placeholder="E-MAIL" required autocomplete="off" value="<?php echo $inputs[0]['email']; ?>">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="senha" placeholder="SENHA" required autocomplete="off" value="<?php echo $inputs[0]['senha']; ?>">
                                        </div>

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="celular" placeholder="CELULAR" required autocomplete="off" value="<?php echo $inputs[0]['celular']; ?>">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <div class="custom-file mt-1">
                                                <input type="file" class="custom-file-input" name="arquivo" id="customFile" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Escolha uma Imagem de Perfil</label>
                                            </div>
                                            <b><span>Formatos Permitidos: PNG, JPG, JPEG, SVG</span><i class="far fa-images ml-2"></i></b>
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