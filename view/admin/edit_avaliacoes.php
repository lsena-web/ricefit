<div class="modal fade" id="modalSucesso" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-success">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Atualização realizada com sucesso!</h5>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a href="avaliacoes.php" class="btn btn-lg btn-outline-light text-bold">Listagem <i class="fas fa-stream"></i></a>
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
                                                        <?php if ($_SESSION['avaliacao']['sexo'] == 'm') { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fas fa-male text-xl text-bold text-success"></i></a>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fas fa-female text-xl text-bold text-success"></i></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                                        <?php if ($_SESSION['avaliacao']['sexo'] == 'm') { ?>
                                                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                                <div class="d-flex  justify-content-center">
                                                                    <img src="img/male.png" alt="">
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                                                <div class="d-flex  justify-content-center">
                                                                    <img src="img/female.png" alt="">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
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
                                                    <p>Campo obrigatório<b class="text-success text-lg">*</b></p>
                                                </div>
                                            </div>

                                            <input type="hidden" name="id" value="<?= $infoInputs[0]['id'] ?>">

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>pescoço (1)</label>
                                                <input class="form-control form-control-lg" type="text" name="pescoco" data-js="float" placeholder="(1) PESCOÇO CM *" required autocomplete="off" value="<?= $infoInputs[0]['pescoco'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>ombros (2)</label>
                                                <input class="form-control form-control-lg" type="text" name="ombros" data-js="float" placeholder="(2) OMBROS CM *" required autocomplete="off" value="<?= $infoInputs[0]['ombros'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>peitoral (3)</label>
                                                <input class="form-control form-control-lg" type="text" name="peitoral" data-js="float" placeholder="(3) PEITORAL CM *" required autocomplete="off" value="<?= $infoInputs[0]['peitoral'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>abdomen (4)</label>
                                                <input class="form-control form-control-lg" type="text" name="abdomen" data-js="float" placeholder="(4) ABDOMEN CM *" required autocomplete="off" value="<?= $infoInputs[0]['abdomen'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>cintura (5)</label>
                                                <input class="form-control form-control-lg" type="text" name="cintura" data-js="float" placeholder="(5) CINTURA CM *" required autocomplete="off" value="<?= $infoInputs[0]['cintura'] ?>">
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>quadril (6)</label>
                                                <input class="form-control form-control-lg" type="text" name="quadril" data-js="float" placeholder="(6) QUADRIL CM *" required autocomplete="off" value="<?= $infoInputs[0]['quadril'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Direito</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>biceps direito (7)</label>
                                                <input class="form-control form-control-lg" type="text" name="bicepsD" data-js="float" placeholder="(7) BÍCEPS DIREITO CM *" required autocomplete="off" value="<?= $infoInputs[0]['bicepsDireito'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>antebraço direito (8)</label>
                                                <input class="form-control form-control-lg" type="text" name="antebracoD" data-js="float" placeholder="(8) ANTEBRAÇO DIREITO CM *" required autocomplete="off" value="<?= $infoInputs[0]['antebracoDireito'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>coxa direita (9)</label>
                                                <input class="form-control form-control-lg" type="text" name="coxaD" data-js="float" placeholder="(9) COXA DIREITA CM *" required autocomplete="off" value="<?= $infoInputs[0]['coxaDireita'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>panturrilha direita (10)</label>
                                                <input class="form-control form-control-lg" type="text" name="panturrilhaD" data-js="float" placeholder="(10) PANTURRILHA DIREITA CM *" required autocomplete="off" value="<?= $infoInputs[0]['panturrilhaDireita'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">Esquerdo</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>biceps esquerdo (11)</label>
                                                <input class="form-control form-control-lg" type="text" name="bicepsE" data-js="float" placeholder="(11) BÍCEPS ESQUERDO CM *" required autocomplete="off" value="<?= $infoInputs[0]['bicepsEsquerdo'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>antebraço esquerdo (12)</label>
                                                <input class="form-control form-control-lg" type="text" name="antebracoE" data-js="float" placeholder="(12) ANTEBRAÇO ESQUERDO CM *" required autocomplete="off" value="<?= $infoInputs[0]['antebracoEsquerdo'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>coxa esquerda (13)</label>
                                                <input class="form-control form-control-lg" type="text" name="coxaE" data-js="float" placeholder="(13) COXA ESQUERDA CM *" required autocomplete="off" value="<?= $infoInputs[0]['coxaEsquerda'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>panturrilha esquerda (14)</label>
                                                <input class="form-control form-control-lg" type="text" name="panturrilhaE" data-js="float" placeholder="(14) PANTURRILHA ESQUERDA CM *" required autocomplete="off" value="<?= $infoInputs[0]['panturrilhaEsquerda'] ?>">
                                            </div>

                                            <div class="col-12">
                                                <div class="callout callout-success">
                                                    <h5 class="text-bold text-success">IMC</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>peso (kg)</label>
                                                <input class="form-control form-control-lg" type="text" name="peso" data-js="float" placeholder="PESO (KG) *" required autocomplete="off" value="<?= $infoInputs[0]['peso'] ?>">
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <label>altura (m)</label>
                                                <input class="form-control form-control-lg" type="text" name="altura" data-js="altura" placeholder="ALTURA (M) *" required autocomplete="off" value="<?= $infoInputs[0]['altura'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-lg btn-success btn-block text-bold" name="btnSalvar" value="salvar">Salvar</button>
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