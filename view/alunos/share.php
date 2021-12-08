<div class="content-wrapper" style="min-height: 1600px;">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3 text-bold text-success">Avaliação</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active text-bold" href="#tab_1" data-toggle="tab">IMC</a></li>
                                <li class="nav-item"><a class="nav-link text-bold" href="#tab_2" data-toggle="tab">Medidas</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body px-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <!-- alterando tamanhos para responsividade -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="card card-success card-outline card-outline-tabs">
                                                    <div class="card-header p-0 border-bottom-0">
                                                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="man1-tab" data-toggle="pill" href="#man1" role="tab" aria-controls="man1" aria-selected="true"><?php if ($aluno[0]['sexo'] == 'm') {
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
                                <!-- /.tab-pane -->
                                <div class="tab-pane p-2" id="tab_2">
                                    <div class="card card-success card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fas fa-ruler-vertical"></i> Medidas</h3>
                                        </div> <!-- /.card-body -->
                                        <div class="card-body">
                                            <div class="row">

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
                                                        <h5 class="text-bold text-success">Lado direito</h5>
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
                                                        <h5 class="text-bold text-success">Lado esquerdo</h5>
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
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>