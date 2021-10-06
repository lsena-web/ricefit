<?php
require_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('alunos');
$grupos = new \App\Model\Conexao('grupos');
$gp = $grupos->read();

$alertaLogin    = '';
$alertaArquivo  = '';

// buscando informações para preencher os inputs
if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {

    $infoInputs = $con->read('id= ' . $_GET['id']);
}

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $formatosPermitidos = array("png", "jpge", "jpg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    $login = $dados['login'];
    $buscaLogin = $con->read('login = ' . "'$login'");
    if (!empty($buscaLogin)) {
        if ($buscaLogin[0]['id'] != $dados['id']) {
            $testeLogin = true;
        }
    }

    if (isset($testeLogin) && $testeLogin == true) {
        $alertaLogin = 'Login: ' . $login . ' já está em uso!';
        $infoInputs = $con->read('id= ' . $dados['id']);
    } else {
        if (!empty($_FILES['arquivo']['tmp_name'])) {
            if (in_array($extensao, $formatosPermitidos)) {

                $pasta = "arquivos/alunos/";
                $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
                $novoNome = uniqid() . ".$extensao";

                // UPLOAD
                move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
            } else {
                $infoInputs = $con->read('id= ' . $dados['id']);
                $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';
            }
        }


        if (empty($alertaArquivo)) {
            $arquivo = $con->read('id= ' . $dados['id']);
            $pasta = "arquivos/alunos/";

            if (!empty($novoNome)) {
                foreach ($arquivo as $v) {
                    unlink($pasta . "/" . $v['anexo']);
                }
                $anexo['anexo'] = $novoNome;
            }

            if (isset($dados['senha']) && !empty($dados['senha'])) {
                $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $anexo['senha'] = $senhaSegura;
            }

            $atualizacao = $con->update('id= ' . $dados['id'], [
                'nome'    => $dados['nome'],
                'login'    => $dados['login'],
                'email'    => $dados['email'],
                'celular'    => $dados['celular'],
                'descricao' => $dados['descricao'],
                'turma' => $dados['turma'],
            ] + $anexo);
        }
    }
}



include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/editAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  }
