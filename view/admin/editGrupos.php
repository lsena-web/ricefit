<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Atualização realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="listaGrupos.php" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
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
                    <h1><b>Turmas</b><i class="fas fa-users text-success ml-2"></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Atualização</li>
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
                            <a href="listaGrupos.php" class="btn btn-lg btn-success">Listagem <i class="fas fa-list-ul"></i></a>
                        </div>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">
                                        <?php if (isset($infoInputs)) {
                                        ?>

                                            <input type="text" name="id" value="<?php echo $infoInputs[0]['id']; ?>" hidden>
                                            <div class="col-lg-8 col-md-6 mb-3">
                                                <label class="col-sm-2 col-form-label">Nome</label>
                                                <input class="form-control form-control-lg" type="text" name="nome" placeholder="Nome da Comissão" value="<?php echo $infoInputs[0]['nome']; ?>" required autocomplete="off">
                                            </div>

                                            <div class="col-lg-4 col-md-6 mb-3">
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <select class="custom-select custom-select-lg " name="status" required>
                                                    <option selected value="<?php echo $infoInputs[0]['condicao']; ?>">
                                                        <?php if ($infoInputs[0]['condicao'] == 's') {
                                                            echo 'ATIVO';
                                                        } else {
                                                            echo 'INATIVO';
                                                        } ?></option>
                                                <?php } ?>
                                                <option value="s">ATIVO</option>
                                                <option value="n">INATIVO</option>
                                                </select>
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