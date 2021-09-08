<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Perfil</b> <i class="fas fa-user"></i></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Conselheiros</li>
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
                                <b>Perfil </b><i class="fas fa-user text-success" style="font-size:25px;"></i></a>
                            </h3>
                        </div>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12">

                                    <div class="row">


                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="nome" placeholder="NOME" required autocomplete="off">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="email" placeholder="LOGIN" required autocomplete="off">
                                        </div>

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="nome" placeholder="E-MAIL" required autocomplete="off">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="cpf" placeholder="SENHA" required autocomplete="off">
                                        </div>

                                        <div class="col-lg-7 col-md-6 mb-3">
                                            <input class="form-control form-control-lg" type="text" name="cpf" placeholder="CELULAR" required autocomplete="off">
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-3">
                                            <div class="custom-file mt-1">
                                                <input type="file" class="custom-file-input" name="img" id="customFile" required accept="image/*">
                                                <label class="custom-file-label" for="customFile">Escolha uma Imagem de Perfil</label>
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