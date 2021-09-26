<?php
require_once '../vendor/autoload.php';

$pDao = new \App\Model\ProfessorDao('grupos');


if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $infoInputs = $pDao->read('id= ' . $id);
}


if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $atualizacao = $pDao->update('id= ' . $dados['id'], [
        'nome'    => $dados['nome'],
        'condicao' => $dados['status'],
    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/edit_grupos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>