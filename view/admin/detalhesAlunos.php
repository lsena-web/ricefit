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


                    <?php
                    if (isset($dados)) {
                        foreach ($dados as $value) { ?>
                            <div class="card-body ">
                                <div class="row d-flex justify-content-center ">
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="card bg-light d-flex flex-fill">

                                            <div class="card-header border-bottom-0 text-success text-lg text-bold">
                                                Detalhes
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-6  text-center mt-5">
                                                        <img src="arquivos/alunos/<?php echo $value['anexo']; ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 15rem;">
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 mt-5">
                                                        <h2 class="text-muted text-bold text-lg"><b><?php echo $value['nome']; ?></b></h2>

                                                        <ul class="ml-0 mb-0 fa-ul ">
                                                            <li class="mb-2"><span class="text-success text-lg text-bold">Turma: </span><span class="text-lg text-bold"><?php echo $value['turma']; ?></span></li>
                                                            <li class="mb-2"><span class="text-success text-lg text-bold">E-mail: </span><span class="text-lg text-bold"><?php echo $value['email']; ?></span></li>
                                                            <li class="mb-2"><span class="text-success text-lg text-bold">Celular: </span><span class="text-lg text-bold"><?php echo $value['celular']; ?></span></li>
                                                            <li class="mb-2"><span class="text-success text-lg text-bold">Status: </span><span class="text-lg text-bold"><?php if ($value['condicao'] == 's') {
                                                                                                                                                                                echo 'ATIVO';
                                                                                                                                                                            } else {
                                                                                                                                                                                echo 'INATIVO';
                                                                                                                                                                            } ?></span></li>
                                                        </ul>
                                                        <p class="text-success text-bold text-lg">Descrição:</p>
                                                        <p class="text-bold text-lg"><?php echo $value['descricao']; ?></p>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <a href="editAlunos.php?id=<?php echo $value['id']; ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i> Editar Informações
                                                    </a>
                                                </div>
                                            </div>

                                    <?php }
                            } ?>


                                        </div>
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- ./row -->

                                <!-- ./row -->
    </section>
</div>
<!-- /.content-wrapper -->