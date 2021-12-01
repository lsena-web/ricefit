<?php

include_once '../vendor/autoload.php';

use App\Session\Login;

Login::loginCliente();

// CONEXÃO
$con = new \App\Model\Conexao('alunos');

// BUSCANDO INFORMAÇÃO
$inputs = $con->read('id = ' . $_SESSION['cliente']['id']);

$alerta         = '';
$alertaArquivo  = '';

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $con2 = new \App\Model\Conexao('admin');

    $email = $dados['email'];

    $teste   = $con->read('email = ' . "'$email'");
    $teste2  = $con2->read('email = ' . "'$email'");

    if (!empty($teste)) {
        $testeId = $teste[0]['id'];
    } else {
        $testeId = '';
    }

    // VALIDANDO E-MAIL
    if ($testeId  == $_SESSION['cliente']['id'] || empty($teste) && empty($teste2)) {

        // AUXILIARES
        $anexo = [];


        $formatosPermitidos = array("png", "jpg", "jpeg", "svg");
        $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

        // VERIFICANDO SE A IMAGEM FOI ENVIADA
        if (!empty($_FILES['arquivo']['tmp_name'])) {

            if (in_array($extensao, $formatosPermitidos)) {

                $pasta = "../admin/arquivos/alunos/";

                $caminhoTemporario = $_FILES['arquivo']['tmp_name'];

                $novoNome = uniqid() . ".$extensao";

                $arquivo = $con->read('id= ' . $_SESSION['cliente']['id']);

                // CASO QUEIRA ATUALIZAR O ARQUIVO
                if (!empty($novoNome)) {

                    foreach ($arquivo as $v) {

                        if (!empty($v['anexo'])) {

                            unlink($pasta . $v['anexo']);
                        }
                    }
                }

                // ENVIANDO NOME DO ARQUIVO PARA O ARRAY
                $anexo['anexo'] = $novoNome;
                // UPLOAD
                move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
            } else {

                $alertaArquivo  = 'Arquivo inválido! escolha um arquivo com formato permitido.';
            }
        }

        // VERIFICANDO SE A SENHA FOI ENVIADA
        if (isset($dados['senha']) && !empty($dados['senha'])) {

            $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $anexo['senha'] = $senhaSegura;
        }

        // VERIFICANDO SE EXISTE ALGUM ALERTA
        if (empty($alertaArquivo)) {

            $celular = preg_replace('/\D/', '', $dados['celular']);

            $atualizacao = $con->update('id= ' . $_SESSION['cliente']['id'], [
                'nome'    => $dados['nome'],
                'email' => $dados['email'],
                'celular' => $celular
            ] + $anexo);
        }
    } else {

        $alerta  = 'E-mail indisponível!';
    }
}



include __DIR__ . '/../includes/alunos/header.php';
include __DIR__ . '/../view/alunos/perfil.php';
include __DIR__ . '/../includes/alunos/footer.php';

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
