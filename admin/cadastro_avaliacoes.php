<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('avaliacoes');

// CADASTRO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {


    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    $cadastro = $con->create([
        'idAluno'   => $dados[''],
        'peso'      => $dados[''],
        'altura'    => $dados[''],
        'imc'       => $dados[''],

        'pescoco'   => $dados[''],
        'ombros'    => $dados[''],
        'peitoral'  => $dados[''],
        'abdomen'   => $dados[''],
        'cintura'   => $dados[''],
        'quadril'   => $dados[''],

        'bicepsDireito'         => $dados[''],
        'bicepsEsquerdo'        => $dados[''],
        'antebracoDireito'      => $dados[''],
        'antebracoEsquerdo'     => $dados[''],
        'coxaDireita'           => $dados[''],
        'coxaEsquerda'          => $dados[''],
        'panturrilhaDireita'    => $dados[''],
        'panturrilhaEsquerda'   => $dados[''],

        'dataAvaliacao' => $dados[''],
        'dataAtualizacao' => $dados[''],

    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/cadastro_avaliacoes.php';
include __DIR__ . '/../includes/admin/footer.php';

// OPERAÇÃO REALIZADA COM SUCESSO
if (isset($cadastro) && !empty($cadastro)) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}

// ERRO NA OPERAÇÃO
if (isset($cadastro) && !is_numeric($cadastro)) {
    echo
    "<script>
        $(function() {
            document.Toast.fire({icon: 'error',title: ' Erro, tente novamente!'}); 
        });
     </script>";
}
