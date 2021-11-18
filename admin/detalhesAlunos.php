<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('alunos');

if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {

    $dados = $con->read('id = ' . $_GET['id']);
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/detalhesAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';
