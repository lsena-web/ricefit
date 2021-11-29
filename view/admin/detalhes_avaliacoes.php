<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h4 class="modal-title">Compartilhe!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="4" disabled>http://localhost/ricefit/public/share.php?id=<?= $infoInputs[0]['id'] ?>&chave=<?= $infoInputs[0]['link'] ?></textarea>
                        </div>
                    </div>
                    <p class="text-bold mb-0">Copie para a área de transferência </p>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="<?= $textLink ?>" class="btn btn-outline-light btn-lg btn-block text-bold" target="_blank"><i class="far fa-share-square"></i> Compartilhar</a>
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
                    <?php if (isset($infoInputs) && !empty($infoInputs)) {
                        echo '<h1><b>' . $_SESSION['avaliacao']['nome'] . ' ' . date('d-m-Y', strtotime($infoInputs[0]['dataAvaliacao'])) . '</b><i class="fas fa-clipboard text-success ml-2"></i></h1>';
                    } else {
                        echo '<h1><b>' . $_SESSION['avaliacao']['nome'] . '</b><i class="fas fa-clipboard text-success ml-2"></i></h1>';
                    } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php" class="text-success">Home</a></li>
                        <li class="breadcrumb-item active">Avaliações</li>
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
                                <?php if (isset($infoInputs) && !empty($infoInputs)) {
                                    echo '<a href="avaliacoes.php" class="btn btn-lg btn-success">Listagem <i class="fas fa-list-ul"></i></a>';
                                } else {
                                    echo '<a href="atividades.php" class="btn btn-lg btn-success">Listagem <i class="fas fa-list-ul"></i></a>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($infoInputs) && !empty($infoInputs)) { ?>
                        <div class="card-body">
                            <div class="row">
                                <!-- alterando tamanhos para responsividade -->
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card card-success card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="man1-tab" data-toggle="pill" href="#man1" role="tab" aria-controls="man1" aria-selected="true"><?php if ($_SESSION['avaliacao']['sexo'] == 'm') {
                                                                                                                                                                                                echo '<i class="fas fa-male text-xl text-bold text-success"></i><span class="text-success text-lg"> ' . $number . '</span>';
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo '<i class="fas fa-female text-xl text-bold text-success"></i><span class="text-success text-lg"> ' . $number . '</span>';
                                                                                                                                                                                            } ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-four-tabContent">

                                                        <div class="tab-pane fade show active" id="man1" role="tabpanel" aria-labelledby="man1-tab">
                                                            <div class="d-flex  justify-content-center">
                                                                <img src="<?= $imagem ?>" alt="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success"><?= $grau ?></h5>
                                                    <p class="text-success">IMC: <?= $imc ?></p>
                                                    <p><?= $aviso ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- alterando tamanhos para responsividade -->
                                <div class="col-lg-8 col-md-6 col-sm-12">
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Medidas</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>pescoço</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['pescoco'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>ombros</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['ombros'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>peitoral</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['peitoral'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>abdomen</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['abdomen'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>cintura</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['cintura'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>quadril</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['quadril'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Direito</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>biceps direito</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['bicepsDireito'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>antebraço direito</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['antebracoDireito'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>coxa direita</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['coxaDireita'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>panturrilha direita</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['panturrilhaDireita'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Esquerdo</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>biceps esquerdo</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['bicepsEsquerdo'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>antebraço esquerdo</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['antebracoEsquerdo'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>coxa esquerda</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['coxaEsquerda'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>panturrilha esquerda</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['panturrilhaEsquerda'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Peso e Altura</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>peso (kg)</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['peso'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>altura (m)</label>
                                                <input class="form-control form-control-lg" type="text" disabled value="<?= $infoInputs[0]['altura'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-lg btn-success btn-block text-bold" data-toggle="modal" data-target="#modal-success">Compartilhar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>
</div>