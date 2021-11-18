<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('exercicios');
$alertaArquivo  = '';
// buscando informações para preencher os inputs
if (isset($_GET['id']) and !empty($_GET['id']) and is_numeric($_GET['id'])) {

    $infoInputs = $con->read('id= ' . $_GET['id']);
}

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $formatosPermitidos = array("png", "jpge", "jpg", "svg", "mp4", "mkv", "avi", "wmv", "wma", "rmvb", "mov", "3gp", "flv");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    if (!empty($_FILES['arquivo']['tmp_name'])) {
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
        $atualizacao = $con->update('id= ' . $dados['id'], [
            'nome'    => $dados['nome'],
            'descricao' => $dados['descricao']
        ] + $anexo);
    }
}



include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/editExercicios.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  }
