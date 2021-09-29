<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Informação deletada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
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
                        <input type="text" name="deletar" value="<?php echo $valor['id'] ?>" hidden>
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
                        <li class="breadcrumb-item active">Exercícios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="card card-outline card-success">
            <div class="card-header row">

                <div class="col-auto mr-auto">
                    <h3 class="card-title">
                        <b>Listagem</b><i class="fas fa-clipboard-list text-success ml-2"></i></a>
                    </h3>
                </div>

                <div class="col-auto">
                    <a href="cadastroExercicios.php" class="btn btn-lg btn-success">Novo Cadastro <i class="fab fa-wpforms" style="font-size: 29px;"></i></a>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Anexo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($table as $value) { ?>
                            <tr>
                                <td class="text-center text-bold text-lg"><?php echo $value['nome']; ?></td>
                                <td class="text-center text-lg"><?php echo $value['descricao']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?file=<?php echo $value['id']; ?>" class="text-bold btn btn-lg btn-primary"><i class="fas fa-file-download"></i><span class="m-1">Anexo</span></a>
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
                            <th>Anexo</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>