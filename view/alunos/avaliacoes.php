<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <span class="text-success">Listagem de</span> avaliações</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Avaliações</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="card card-success card-outline">

                <div class="card-header">
                    <div class="row">
                        <div class="col-auto ml-auto">
                            <?php if (!empty($table)) {
                                echo '<a href="geral.php" class="btn btn-lg btn-success"><i class="fas fa-chart-pie"></i></a>';
                            } else {
                                echo '<button class="btn btn-lg btn-success" disabled><i class="fas fa-chart-pie"></i></button>';
                            } ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>IMC</th>
                                <th>peso (kg)</th>
                                <th>Data avaliação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($table as $value) { ?>
                                <tr>
                                    <td class="text-center text-bold text-lg"><?= $value['imc'] ?></td>
                                    <td class="text-center text-bold text-lg"><?= $value['peso'] ?></td>
                                    <td class="text-center text-bold text-lg"><?= date('d/m/Y', strtotime($value['dataAvaliacao'])) ?></td>

                                    <td>
                                        <a class="btn btn-sm btn-success btn-block" href="detalhes.php?id=<?= $value['id'] ?>">
                                            <i class="fas fa-eye"></i>
                                            Detalhes
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>IMC</th>
                                <th>peso (kg)</th>
                                <th>Data avaliação</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>