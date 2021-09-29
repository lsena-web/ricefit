<?php

include_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('admin');

$inputs = $con->read();


if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {


    $anexo = [];

    $formatosPermitidos = array("png", "jpg", "jpeg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    if (in_array($extensao, $formatosPermitidos)) {

        $pasta = "arquivos/";
        $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";
        $anexo['anexo'] = $novoNome;
        // UPLOAD
        move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
    }

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $arquivo = $con->read('id= ' . $dados['id']);
    $pasta = "arquivos/";


    $atualizacao = $con->update('id= ' . $dados['id'], [
        'nome'    => $dados['nome'],
        'email' => $dados['email'],
        'login' => $dados['login'],
        'senha' => $dados['senha'],
        'celular' => $dados['celular']
    ] + $anexo);
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