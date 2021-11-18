<?php

include_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

use App\Controller\Geral; // mascara

$con = new \App\Model\Conexao('admin');

$inputs = $con->read();

$alertaArquivo  = '';

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    // AUXILIARES
    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $formatosPermitidos = array("png", "jpg", "jpeg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    // VERIFICANDO SE A IMAGEM FOI ENVIADA
    if (!empty($_FILES['arquivo']['tmp_name'])) {
        if (in_array($extensao, $formatosPermitidos)) {

            $pasta = "arquivos/perfil/";
            $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid() . ".$extensao";

            $arquivo = $con->read('id= ' . $dados['id']);

            // CASO QUEIRA ATUALIZAR O ARQUIVO
            if (!empty($novoNome)) {
                foreach ($arquivo as $v) {
                    unlink($pasta . "/" . $v['anexo']);
                }
            }

            $anexo['anexo'] = $novoNome; // ENVIANDO NOME DO ARQUIVO PARA O ARRAY

            // UPLOAD
            move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
        } else {
            $infoInputs = $con->read('id= ' . $dados['id']);
            $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';
        }
    }

    // VERIFICANDO SE A SENHA FOI ENVIADA
    if (isset($dados['senha']) && !empty($dados['senha'])) {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $senha = addslashes($dados['senha']);
        $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

        $anexo['senha'] = $senhaSegura;
    }

    // VERIFICANDO SE EXISTE ALGUM ALERTA
    if (empty($alertaArquivo)) {

        $arquivo = $con->read('id= ' . $dados['id']);
        $pasta = "arquivos/perfil/";
        $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $celular = preg_replace('/\D/', '', $dados['celular']);

        $atualizacao = $con->update('id= ' . $dados['id'], [
            'nome'    => $dados['nome'],
            'email' => $dados['email'],
            'celular' => $celular
        ] + $anexo);
    }
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/perfil.php';
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
