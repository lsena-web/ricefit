<?php

require_once '../vendor/autoload.php';

if (!empty(($_GET['chave']))) {

    // CONEXÃO
    $con = new \App\Model\Conexao('alunos');

    // FILTRANDO CHAVE
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

    // BUSCANDO CHAVE
    $busca = $con->read('recover = ' . "'$chave'");

    // AUXILIARES
    $alerta = '';
    $atualizacao = '';

    // VALIDANDO CHAVE
    if (!empty($busca)) {

        // ALTERANDO SENHA
        if (isset($_POST['btnEnviar']) && !empty($_POST['btnEnviar'])) {

            // FILTRANDO INPUT
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // CRIPTOGRAFANDO NOVA SENHA
            $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);

            // ZERANDO CAMPO RECOVER
            $recover = 'NULL';

            // ATUALIZANDO CAMPOS
            $atualizacao = $con->update('id= ' . $busca[0]['id'], ['senha' => $senhaSegura, 'recover' => $recover]);

            // EMITINDO MENSSAGEM
            if ($atualizacao != true) {

                $alerta = 'Erro! tente novamente.';
            }
        }
    } else {
        header('Location: forgot.php');
        exit;
    }
} else {
    header('Location: forgot.php');
    exit;
}


include __DIR__ . '/../includes/links/header.php';
include __DIR__ . '/../view/alunos/recover.php';
include __DIR__ . '/../includes/links/footer.php';
