<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Informação deletada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>


<?php if (!isset($delete)) {
    $delete = null;
} else {
    foreach ($delete as $valor) { ?>
        <div class="modal fade" id="modalDel" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content bg-danger">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que você deseja deletar?</h5>
                    </div>
                    <form method="POST">
                        <input type="text" name="deletar" value="<?php echo $valor['id']; ?>" hidden>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-lg btn-outline-light" name="btnClose" value="close">Fechar</button>
                            <button type="submit" class="btn btn-lg btn-outline-light" name="btnDel" value="deletar">Deletar <i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php }
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Exercícios</b><i class="fas fa-dumbbell text-success ml-2"></i></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Exercícios</li>
                        <li class="breadcrumb-item active">Listagem</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto ml-auto">
                                    <a href="cadastroExercicios.php" class="btn btn-lg btn-success">Novo Cadastro <i class="fab fa-wpforms" style="font-size: 29px;"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Anexos</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($table as $value) { ?>
                                        <tr>
                                            <td class="text-center text-bold text-lg"><?php echo $value['nome']; ?></td>
                                            <td class="text-center"><?php echo $value['descricao']; ?></td>
                                            <td>
                                                <div class="d-flex  justify-content-around">

                                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?file=<?php echo $value['id']; ?>" class="btn btn-primary text-bold  m-1"><i class="fas fa-file-download text-xl"></i> Download</a>
                                                    <a href="<?php echo $caminho . $value['anexo']; ?>" class="glightbox btn btn-success text-bold  m-1"><i class="far fa-play-circle text-xl"></i> Play</a>

                                                </div>
                                            </td>
                                            <td>
                                                <div class=" d-flex justify-content-around">

                                                    <a href="editExercicios.php?id=<?php echo $value['id']; ?>" class="btn btn-info m-1">
                                                        <i class="fas fa-edit"></i>
                                                        Atualizar
                                                    </a>

                                                    <a class="btn btn-danger m-1" href="<?php echo $_SERVER["PHP_SELF"] ?>?del=<?php echo $value['id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                        Deletar
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Anexos</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>