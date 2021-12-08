<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::loginCliente();

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    // CONEXÃO
    $con =  new \App\Model\Conexao('avaliacoes');
    $con2 = new \App\Model\Conexao('configs');

    $id = preg_replace('/\D/', '', $_GET['id']);

    // BUSCANDO INFORMAÇÃO DA AVALIAÇÃO
    $infoInputs = $con->read('id = ' . $id . ' and idAluno = ' . $_SESSION['cliente']['id']);


    $alerta = '';

    if (!empty($infoInputs)) {
        // AUXILIARES
        $sexo   = '';
        $number = '';
        $grau   = '';
        $aviso  = '';
        $imc    = '';

        // buscando informações de imc
        $avisos = $con2->read();

        if ($_SESSION['cliente']['sexo'] == 'm') {
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
    } else {

        $alerta = 'Sem informações no momento!';
    }
} else {

    header('Location: avaliacoes.php');
    exit;
}

include __DIR__ . '/../includes/alunos/header.php';
include __DIR__ . '/../view/alunos/detalhes.php';
include __DIR__ . '/../includes/alunos/footer.php';
