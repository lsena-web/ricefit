<?php

include_once '../vendor/autoload.php';

$p = new \App\Controller\Professor();
$pDao = new \App\Model\ProfessorDao('admin');

$inputs = $pDao->read();


if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $formatosPermitidos = array("png", "jpg", "jpeg", "svg");
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);    // EXTENSÃO DO ARQUIVO

    if (in_array($extensao, $formatosPermitidos)) {

        $pasta = "admin/";
        $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";

        // UPLOAD
        move_uploaded_file($caminhoTemporario, $pasta . $novoNome);
    }

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $arquivo = $pDao->read('id= ' . $dados['id']);
    $pasta = "admin/";

    // CASO QUEIRA ATUALIZAR O ARQUIVO
    if (!empty($novoNome)) {
        foreach ($arquivo as $v) {
            unlink($pasta . "/" . $v['anexo']);
        }
        $atualizacao = $pDao->update('id= ' . $dados['id'], [
            'nome'    => $dados['nome'],
            'email' => $dados['email'],
            'login' => $dados['login'],
            'senha' => $dados['senha'],
            'celular' => $dados['celular'],
            'anexo'     => $novoNome,
        ]);
    } else {
        $atualizacao = $pDao->update('id= ' . $dados['id'], [
            'nome'    => $dados['nome'],
            'email' => $dados['email'],
            'login' => $dados['login'],
            'senha' => $dados['senha'],
            'celular' => $dados['celular'],
        ]);
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