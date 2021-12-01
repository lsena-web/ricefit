<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Calendário de <span class="text-success text-bold">Treino</span></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] ?>">Home</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div id='calendar' class="w-100 mb-5" style="min-height: 600px;"></div>


                <!-- MODAL VISUALIUZAR -->
                <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-bold text-uppercase" id="exampleModalLabel"><span class="" id="title"></span></h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="informacao" id="inform">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 mb-2 p-0">
                                            <div><a href="" id="linkVideo" class="glightbox btn btn-lg btn-success btn-block"><i class="fas fa-play text-xl text-bold"></i> <span class="text-xl text-bold">Play</span></a></div>
                                        </div>

                                        <div class="col-lg-g col-md-6"></div>

                                        <dt class="col-sm-5" hidden>ID DO EVENTO:</dt>
                                        <dd class="col-sm-7" id="id" hidden></dd>

                                        <div class="col-12 p-0">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" id="descricao" name="descricao" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>