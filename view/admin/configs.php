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
                    <h1><b>Configurações</b><i class="fas fa-cogs text-success ml-2"></i></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Configurações</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success">
                    <div class="card-header justify-content-end">
                        <div class="row">
                            <div class="col-auto ml-auto">
                                <h3 class="card-title">
                                    <b>Atualização</b><i class="fas fa-edit text-success ml-2" style="font-size:25px;"></i></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">

                                        <input type="hidden" name="id" value="<?php echo $inputs[0]['id']; ?>">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Magreza *</label>
                                                <textarea class="form-control" rows="3" name="magreza" placeholder="IMC menor que 18.5" required><?= $inputs[0]['magreza'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Normal *</label>
                                                <textarea class="form-control" rows="3" name="normal" placeholder="IMC entre 18.5 e 24.9" required><?= $inputs[0]['normal'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Sobrepeso *</label>
                                                <textarea class="form-control" rows="3" name="sobrepeso" placeholder="IMC entre 25.0 e 29.9" required><?= $inputs[0]['sobrepeso'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Obesidade *</label>
                                                <textarea class="form-control" rows="3" name="obesidade" placeholder="IMC entre 30.0 e 39.9" required><?= $inputs[0]['obesidade'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Obesidade grave *</label>
                                                <textarea class="form-control" rows="3" name="obesidadeGrave" placeholder="IMC maior que 40.0" required><?= $inputs[0]['obesidadeGrave'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="callout callout-success">
                                                <h5 class="text-bold text-success">Atenção</h5>
                                                <p>Campo obrigatório<b class="text-success text-lg">*</b></p>
                                            </div>
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