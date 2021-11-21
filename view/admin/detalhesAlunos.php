<?php

use App\Controller\Geral; // mascara
?>
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
                        <li class="breadcrumb-item active">Detalhes</li>
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


                    <?php if (isset($dados)) { ?>
                        <div class="card-body ">
                            <div class="row d-flex justify-content-center ">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="card bg-light d-flex flex-fill">

                                        <div class="card-header border-bottom-0 text-success text-lg text-bold">
                                            Detalhes
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12 text-center mt-5">
                                                    <img src="arquivos/alunos/<?php echo $dados[0]['anexo']; ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 15rem;">
                                                </div>
                                                <div class="col-lg-8 col-md-12  mt-5">

                                                    <form>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">Nome:</label>
                                                                <input class="form-control form-control-lg text-bold" type="text" disabled value="<?= $dados[0]['nome'] ?>">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">Turma:</label>
                                                                <input class="form-control form-control-lg text-bold" type="text" disabled value="<?= $dados[0]['turma'] ?>">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">E-mail:</label>
                                                                <input class="form-control form-control-lg text-bold" type="text" disabled value="<?= $dados[0]['email'] ?>">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">Celular:</label>
                                                                <input class="form-control form-control-lg text-bold" type="text" disabled value="<?php echo Geral::mask($dados[0]['celular'], '(##) #.####-####'); ?>">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">Status:</label>
                                                                <select class="custom-select custom-select-lg text-success text-bold" disabled>
                                                                    <option selected disabled value="<?= $dados[0]['condicao'] ?>"><?php if ($dados[0]['condicao'] == 's') {
                                                                                                                                        echo 'Ativo';
                                                                                                                                    } else {
                                                                                                                                        echo 'Inativo';
                                                                                                                                    } ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <label class="text-success text-bold">Sexo:</label>
                                                                <select class="custom-select custom-select-lg text-success text-bold" disabled>
                                                                    <option selected disabled value="<?= $dados[0]['sexo'] ?>"><?php if ($dados[0]['sexo'] == 'm') {
                                                                                                                                    echo 'Masculino';
                                                                                                                                } else {
                                                                                                                                    echo 'Feminino';
                                                                                                                                } ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="text-success text-bold">Descrição:</label>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" disabled><?= $dados[0]['descricao'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>




                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="editAlunos.php?id=<?= $dados[0]['id'] ?>" class="btn btn-sm btn-success">
                                                    <i class="fas fa-edit"></i> Editar Informações
                                                </a>
                                            </div>
                                        </div>

                                    <?php } ?>


                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                            <!-- ./row -->

                            <!-- ./row -->
    </section>
</div>
<!-- /.content-wrapper -->