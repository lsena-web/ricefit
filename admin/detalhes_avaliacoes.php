<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

// ARMAZENANDo ID DA AVALIAÇÃO NA SESSÃO
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $_SESSION['avaliacaoView'] = [
        'idAvaliacao'    => $id,
    ];
}

// CONEXÕES COM TABELAS
$con = new \App\Model\Conexao('avaliacoes');
$con2 = new \App\Model\Conexao('configs');
$con3 = new \App\Model\Conexao('alunos');

// PREENCHENDO OS INPUTS
$infoInputs = $con->read('id = ' . $_SESSION['avaliacaoView']['idAvaliacao']);
$infoAluno = $con3->read('id = ' . $infoInputs[0]['idAluno']);

$avisos = $con2->read();

// AUXILIARES
$sexo   = '';
$number = '';
$grau   = '';
$aviso  = '';
$imc    = '';

if ($_SESSION['avaliacao']['sexo'] == 'm') {
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
$imagem = 'img/' . $sexo . $number . '.png';
$textLink = 'https://api.whatsapp.com/send?phone=55' . $infoAluno[0]['celular'] . '&text=http://localhost/ricefit/public/share.php?id=' . $infoInputs[0]['id'] . '%26chave=' . $infoInputs[0]['link'];


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/detalhes_avaliacoes.php';
include __DIR__ . '/../includes/admin/footer.php';
