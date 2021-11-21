<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

// ARMAZENANDO INFORMAÇÕES DO ALUNO NA SESSÃO
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $_SESSION['avaliacaoEdit'] = [
        'idAvaliacao'    => $id,
    ];
}

// CONEXÃO COM A TABELA "AVALIACOES"
$con = new \App\Model\Conexao('avaliacoes');

// PREENCHENDO OS INPUTS
$infoInputs = $con->read('id = ' . $_SESSION['avaliacaoEdit']['idAvaliacao']);

// ATUALIZAÇÃO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    date_default_timezone_set('America/fortaleza');
    $date = date('Y-m-d');

    $imc =  round($dados['peso'] / ($dados['altura'] * $dados['altura']), 1);

    $atualizacao = $con->update('id= ' . $dados['id'], [

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

        'dataAtualizacao' => $date

    ]);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/edit_avaliacoes.php';
include __DIR__ . '/../includes/admin/footer.php';

// OPERAÇÃO REALIZADA COM SUCESSO
if (isset($atualizacao) && !empty($atualizacao)) {
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
