<?php

include_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('configs');

$inputs = $con->read();


if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $atualizacao = $con->update('id= ' . $dados['id'], [
        'magreza'           => $dados['magreza'],
        'normal'            => $dados['normal'],
        'sobrepeso'         => $dados['sobrepeso'],
        'obesidade'         => $dados['obesidade'],
        'obesidadeGrave'    => $dados['obesidadeGrave'],
    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/configs.php';
include __DIR__ . '/../includes/admin/footer.php';

// OPERAÇÃO REALIZADA COM SUCESSO
if (isset($atualizacao)) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}
// ERRO NA OPERAÇÃO
if (isset($atualizacao) && $atualizacao != true) {
    echo
    "<script>
        $(function() {
            document.Toast.fire({icon: 'error',title: ' Erro, tente novamente!'}); 
        });
     </script>";
}
