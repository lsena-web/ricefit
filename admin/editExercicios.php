<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('exercicios');
$alertaArquivo  = '';
$alerta = '';
// buscando informações para preencher os inputs
if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {

    $infoInputs = $con->read('id= ' . $_GET['id']);
}




if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    // VALIDANDO CAMPO DESCRIÇÃO
    if (!empty($dados['descricao'])) {

        $formatosPermitidos = array("png", "jpge", "jpg", "svg", "mp4", "mkv", "avi", "wmv", "wma", "rmvb", "mov", "3gp", "flv");

        $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

        // VERIFICANDO EXISTENCIA DO ARQUIVO
        if (!empty($_FILES['arquivo']['tmp_name'])) {

            // VALIDANDO EXTENSSÃO
            if (in_array($extensao, $formatosPermitidos)) {

                $pasta = "arquivos/exercicios/";
                $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid() . ".$extensao";

                // UPLOAD
                move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
            } else {

                $infoInputs = $con->read('id= ' . $dados['id']);
                $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';
            }
        }

        // VERIFICANDO EXISTENCIA DE ALERTAS
        if (empty($alertaArquivo)) {

            $arquivo = $con->read('id= ' . $dados['id']);

            $pasta = "arquivos/exercicios/";

            // CASO QUEIRA ATUALIZAR O ARQUIVO
            if (!empty($novoNome)) {

                foreach ($arquivo as $v) {

                    unlink($pasta . "/" . $v['anexo']);
                }

                $anexo['anexo'] = $novoNome;
            }

            // ATUALIZANDO INFORMAÇÃO
            $atualizacao = $con->update('id= ' . $dados['id'], [

                'nome'    => $dados['nome'],
                'descricao' => $dados['descricao']
            ] + $anexo);

            // SE DER ERROR
            if ($atualizacao == false) {

                $infoInputs = $con->read('id= ' .  $dados['id']);
            }
        }
    } else {

        $alerta    = 'O campo descrição é obrigatório :)';
        $infoInputs = $con->read('id= ' .  $dados['id']);
    }
}



include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/editExercicios.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao) && $atualizacao == true) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}

// ERRO NA OPERAÇÃO
if (isset($atualizacao) && $atualizacao != true) {
    echo "<script> $(function() {document.Toast.fire({icon: 'error',title: ' Erro, tente novamente!'});}); </script>";
}
