<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('avaliacoes');

// CADASTRO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    date_default_timezone_set('America/fortaleza');
    $date = date('Y-m-d');

    $imc =  round($dados['peso'] / ($dados['altura'] * $dados['altura']), 1);
    $link = password_hash($_SESSION['avaliacao']['id'] . $date, PASSWORD_DEFAULT);

    $cadastro = $con->create([
        'idAluno'   => $_SESSION['avaliacao']['id'],
        'peso'      => $dados['peso'],
        'altura'    => $dados['altura'],
        'imc'       => $imc,

        'pescoco'   => $dados['pescoco'],
        'ombros'    => $dados['ombros'],
        'peitoral'  => $dados['peitoral'],
        'abdomen'   => $dados['abdomen'],
        'cintura'   => $dados['cintura'],
        'quadril'   => $dados['quadril'],

        'bicepsDireito'         => $dados['bicepsD'],
        'bicepsEsquerdo'        => $dados['bicepsE'],
        'antebracoDireito'      => $dados['antebracoD'],
        'antebracoEsquerdo'     => $dados['antebracoE'],
        'coxaDireita'           => $dados['coxaD'],
        'coxaEsquerda'          => $dados['coxaE'],
        'panturrilhaDireita'    => $dados['panturrilhaD'],
        'panturrilhaEsquerda'   => $dados['panturrilhaE'],

        'dataAvaliacao' => $date,
        'dataAtualizacao' => $date,
        'link' => $link

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
