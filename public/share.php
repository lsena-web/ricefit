<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

// INICIANDO SESSÃO
Login::init();

//AUXILIARES
$avaliacao = '';
$aluno     = '';

// VERIFICANDO CHAVE
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['chave']) && !empty($_GET['chave'])) {

    // CONEXÃO
    $conexao = new \App\Model\Conexao('avaliacoes');

    // BUSCA DE INFORMAÇÕES
    $avaliacao = $conexao->read('id =' . $_GET['id']);

    // VALIDANDO ID E CHAVE
    if ($avaliacao[0]['link'] == $_GET['chave']) {

        // SESSÃO PARA BUSCAS
        $_SESSION['link2'] = [

            'id' => $avaliacao[0]['id']
        ];
    } else {
        // ERRO
        header('Location: ../error.html');
        exit;
    }
} else {

    // ERRO
    header('Location: ../error.html');
    exit;
}

// CONEXÃO
$con =  new \App\Model\Conexao('avaliacoes');
$con2 = new \App\Model\Conexao('configs');

// BUSCANDO INFORMAÇÃO DA AVALIAÇÃO
$infoInputs = $con->read('id = ' . $_SESSION['link2']['id']);

// AUXILIARES
$sexo   = '';
$number = '';
$grau   = '';
$aviso  = '';
$imc    = '';

// buscando informações de imc
$avisos = $con2->read();

// CONEXÃO COM TABELA ALUNOS
$scon = new \App\Model\Conexao('alunos');
$aluno = $scon->read('id = ' . $avaliacao[0]['idAluno']);

if ($aluno[0]['sexo'] == 'm') {
    $sexo = 'man';
} else {
    $sexo = 'woman';
}

if ($infoInputs[0]['imc'] < 18.5) {
    $number = 1;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Abaixo do Peso';
    $aviso  = $avisos[0]['magreza'];
} elseif ($infoInputs[0]['imc'] >= 18.5 || $infoInputs[0]['imc'] <= 24.9) {
    $number = 2;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Peso Normal';
    $aviso  = $avisos[0]['normal'];
} elseif ($infoInputs[0]['imc'] >= 25 || $infoInputs[0]['imc'] <= 29.9) {
    $number = 3;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Sobrepeso';
    $aviso  = $avisos[0]['sobrepeso'];
} elseif ($infoInputs[0]['imc'] >= 30 || $infoInputs[0]['imc'] <= 39.9) {
    $number = 4;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Obesidade';
    $aviso  = $avisos[0]['obesidade'];
} else {
    $number = 5;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Obesidade grave';
    $aviso  = $avisos[0]['obesidadeGrave'];
}

// imagem relacionada ao imc
$imagem = '../admin/img/' . $sexo . $number . '.png';


include __DIR__ . '/../includes/links/header.php';
include __DIR__ . '/../view/alunos/share.php';
include __DIR__ . '/../includes/links/footer.php';
