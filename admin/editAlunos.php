<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('alunos');
$con2 = new \App\Model\Conexao('admin');
$grupos = new \App\Model\Conexao('grupos');

use App\Controller\Geral; // MASCARA DE RETORNO DO BANCO DE DADOS

$gp = $grupos->read("condicao = 's'");

$alertaEmail   = '';
$alertaArquivo  = '';

// buscando informações para preencher os inputs
if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {

    $infoInputs = $con->read('id= ' . $_GET['id']);
}

// EDIÇÃO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    // AUXILIARES
    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $formatosPermitidos = array("png", "jpge", "jpg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    $email = $dados['email'];
    $buscaEmail = $con->read('email = ' . "'$email'");
    $buscaAdmin = $con2->read('email = ' . "'$email'");

    if (!empty($buscaEmail)) {

        // CASO OS IDS NÃO SEJAM IGUAIS O EMAIL JA ESTÁ EM USO
        if ($buscaEmail[0]['id'] != $dados['id']) {
            $testeEmail = true;
        }
    }

    if (!empty($buscaAdmin)) {

        // CASO OS IDS NÃO SEJAM IGUAIS O EMAIL JA ESTÁ EM USO
        if ($buscaAdmin[0]['id'] != $dados['id']) {
            $testeEmail = true;
        }
    }

    // VALIDANDO ID´S
    if (isset($testeEmail) && $testeEmail == true) {

        $alertaEmail = 'Email: ' . $email . ' já está em uso!';
        $infoInputs = $con->read('id= ' . $dados['id']);
    } else {

        // VERIFICANDO SE ALGUM ARQUIVO FOI ENVIADO
        if (!empty($_FILES['arquivo']['tmp_name'])) {

            // VERIFICANDO SE É UM ARQUIVO COM EXTENSSÃO PERMITIDA
            if (in_array($extensao, $formatosPermitidos)) {

                $pasta = "arquivos/alunos/";
                $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid() . ".$extensao";

                $arquivo = $con->read('id= ' . $dados['id']);

                // DELETANDO ARQUIVO ANTERIOR
                if (!empty($novoNome)) {

                    foreach ($arquivo as $v) {

                        if (!empty($v['anexo'])) {

                            unlink($pasta . "/" . $v['anexo']);
                        }
                    }
                }

                // NOME DO ARQUIVO PARA INSERT
                $anexo['anexo'] = $novoNome;

                // UPLOAD
                move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
            } else {

                $infoInputs = $con->read('id= ' . $dados['id']);
                $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';
            }
        }

        // VERIFICANDO EXISTÊNCIA DE ALERTA PARA ARQUIVOS
        if (empty($alertaArquivo)) {

            // VERIFICANDO SOLICITAÇÃO DE NOVA SENHA
            if (isset($dados['senha']) && !empty($dados['senha'])) {
                $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $anexo['senha'] = $senhaSegura;
            }

            // APENAS NÚMEROS
            $celular = preg_replace('/\D/', '', $dados['celular']);

            // ATUALIZANDO INFORMAÇÕES
            $atualizacao = $con->update('id= ' . $dados['id'], [
                'nome'      => $dados['nome'],
                'condicao'  => $dados['condicao'],
                'sexo'      => $dados['sexo'],
                'email'     => $dados['email'],
                'celular'   => $celular,
                'descricao' => $dados['descricao'],
                'turma'     => $dados['turma'],
            ] + $anexo);

            // SE DER ERROR
            if ($atualizacao == false) {

                $infoInputs = $con->read('id= ' .  $dados['id']);
            }
        }
    }
}


// INCLUDES
include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/editAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';

// OPERAÇÃO REALIZADA COM SUCESSO
if (isset($atualizacao) && $atualizacao == true) {
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
