<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('grupos');


if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $infoInputs = $con->read('id= ' . $id);
}


if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $atualizacao = $con->update('id= ' . $dados['id'], [
        'nome'    => $dados['nome'],
        'condicao' => $dados['status']
    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/editGrupos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>