<?php
require_once '../vendor/autoload.php';

$pDao = new \App\Model\ProfessorDao('grupos');


// RESPONSAVEL PELO O CADASTRO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $cadastro = $pDao->create([
        'nome'    => $dados['nome']
    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/cadastro_grupos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($cadastro)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>