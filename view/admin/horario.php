<!-- MODAL SUCESSO -->
<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Cadastro realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-lg btn-outline-light text-bold">Calendário <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL SUCESSO -->

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Alteração realizada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-lg btn-outline-light text-bold">Calendário <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL EDIT -->



<!-- MODAL DELETE -->
<?php if (!isset($delete)) {
    $delete = null;
} else {
    foreach ($delete as $valor) { ?>
        <div class="modal fade" id="modalDel" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered ">
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
<!-- END MODAL DELETE SUCESSO -->

<!-- MODAL DELETE -->
<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Informação deletada com Sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="calendario.php" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DELETE SUCESSO -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Calendário </b> <i class="far fa-calendar-alt text-success"></i></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../home/home.php">Home</a></li>
                        <li class="breadcrumb-item active">Calendário</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-success row d-flex justify-content-center p-lg-2 p-md-2 p-sm-0 m-1">
                    <div class="col-md-12">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL VISUALIUZAR e atualizar -->
<div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="informacao" id="inform">
                    <dl class="row">

                        <div class="col-lg-g col-md-6">
                            <div><span class="text-bold">Título:</span> <span class="" id="title"></span></div>
                        </div>
                        <div class="col-lg-g col-md-6">
                            <div><span class="text-bold">Inicio:</span> <span class="" id="start"></span></div>
                            <div><span class="text-bold">Fim:</span> <span class="" id="end"></span></div>
                        </div>
                        <div class="col-lg-g col-md-6"></div>

                        <dt class="col-sm-5" hidden>ID DO EVENTO:</dt>
                        <dd class="col-sm-7" id="id" hidden></dd>

                        <div class="col-12 p-0">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="descricao" disabled></textarea>
                            </div>
                        </div>
                    </dl>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-warning " id="btnEditar">Editar</button>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                            <input type="hidden" name="del" id="apagarEvento">
                            <button class="btn btn-danger" id="btnEditar">Deletar</button>
                        </form>

                    </div>
                </div>

                <!-- form atualizar -->
                <div class="hide" id="editar">

                    <form id="addenvent" method="POST">

                        <input type="hidden" name="codigo" id="codigo">

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required autocomplete="off">
                        </div>


                        <div class="mb-3">
                            <div class="form-group">
                                <label>Example select</label>
                                <select class="form-control" name="cor" id="cor" required>
                                    <option selected disabled value=""></option>
                                    <option class="bg-warning text-bold" value="#ffc107">Amarelo</option>
                                    <option class="bg-danger text-bold" value="#dc3545">Vermelho</option>
                                    <option class="bg-primary text-bold" value="#007bff">Azul</option>
                                    <option class="bg-info text-bold" value="#17a2b8">Cyan</option>
                                    <option class="bg-success text-bold" value="#28a745">Verde</option>
                                    <option class="bg-secondary text-bold" value="#6c757d">Cinza</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Inicio do Envento</label>
                            <input type="text" class="form-control" id="inicio" name="inicio" onkeypress="DataHora(event, this)" required autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Termino do Evento</label>
                            <input type="text" class="form-control" id="fim" name="fim" onkeypress="DataHora(event, this)" required autocomplete="off">
                        </div>


                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" id="btnCancel">Cancelar</button>
                            <button type="submit" name="btnEditar" value="editar" class="btn btn-success">Salvar</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal cadastrar -->
<div class="modal fade p-0" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Exercício</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addenvent" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <input type="hidden" name="idAluno" value="<?= $_GET['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="titulo" required autocomplete="off">
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label>Exercício</label>
                                    <select class="form-control" name="exercicio" id="exercicio" required>
                                        <option selected disabled value="">Escolha um exercício</option>
                                        <?php if (!empty($exercicios)) {
                                            foreach ($exercicios as $exercicio) {   ?>
                                                <option class="text-bold" value="<?= $exercicio['id'] ?>"><?= $exercicio['nome'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label>Cor</label>
                                    <select class="form-control" name="cor" id="color" required>
                                        <option selected disabled value="">Selecione uma cor</option>
                                        <option class="bg-warning text-bold" value="#ffc107">Amarelo</option>
                                        <option class="bg-danger text-bold" value="#dc3545">Vermelho</option>
                                        <option class="bg-primary text-bold" value="#007bff">Azul</option>
                                        <option class="bg-info text-bold" value="#17a2b8">Cyan</option>
                                        <option class="bg-success text-bold" value="#28a745">Verde</option>
                                        <option class="bg-secondary text-bold" value="#6c757d">Cinza</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Inicio do Envento</label>
                                <input type="text" class="form-control" id="c-start" name="start" onkeypress="DataHora(event, this)" required autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Termino do Evento</label>
                                <input type="text" class="form-control" id="c-end" name="end" onkeypress="DataHora(event, this)" required autocomplete="off">
                            </div>
                        </div>

                    </div>

                    <div class="col-12 p-0">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição..." required></textarea>
                        </div>
                    </div>

                    <button type="submit" id="cadEnvent" name="btnCadastro" value="cadastro" class="btn btn-success">Cadastrar</button>
                </form>
            </div>

        </div>
    </div>
</div>