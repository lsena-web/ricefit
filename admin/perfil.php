<?php

include_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('admin');

$inputs = $con->read();
$alertaArquivo  = '';

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {


    $anexo = [];
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $formatosPermitidos = array("png", "jpg", "jpeg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    if (!empty($_FILES['arquivo']['tmp_name'])) {
        if (in_array($extensao, $formatosPermitidos)) {

            $pasta = "arquivos/perfil/";
            $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid() . ".$extensao";
            $anexo['anexo'] = $novoNome;
            // UPLOAD
            move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
        } else {
            $infoInputs = $con->read('id= ' . $dados['id']);
            $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';
        }
    }

    if (empty($alertaArquivo)) {
        $arquivo = $con->read('id= ' . $dados['id']);
        $pasta = "arquivos/perfil/";


        $atualizacao = $con->update('id= ' . $dados['id'], [
            'nome'    => $dados['nome'],
            'email' => $dados['email'],
            'login' => $dados['login'],
            'senha' => $dados['senha'],
            'celular' => $dados['celular']
        ] + $anexo);
    }
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/perfil.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($atualizacao)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>