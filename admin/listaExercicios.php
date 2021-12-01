<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('exercicios');

$table =  $con->read();
$caminho = "arquivos/exercicios/";

// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $con->read('id= ' . $id);
}

// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $delete = ''; // omitindo modal delete pós confirmação

    $id = $_POST['deletar'];
    $arquivo = $con->read('id=' . $id);

    $pasta = "arquivos/exercicios/";
    if (!empty($arquivo)) { // DELETANDO ARQUIVO
        foreach ($arquivo as $v) {
            unlink($pasta . "/" . $v['anexo']);
        }
    }
    $deletado = $con->delete('id= ' . $id); // DELETANDO informação

}

// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}


// forçando download
if (isset($_GET['file']) and !empty($_GET['file']) and is_numeric($_GET['file'])) {

    $pasta = "arquivos/exercicios/";
    $id = addslashes($_GET['file']);
    $dados = $con->read('id=' . $id);

    foreach ($dados as $v) {
        $local_arquivo = $pasta . '/' . $v['anexo'];
        $extensao = PATHINFO($v['anexo'], PATHINFO_EXTENSION);
    }



    if (isset($local_arquivo)) {
        if (file_exists($local_arquivo)) {
            header('Content-Type: application/octet-stream');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename('aula.' . $extensao));
            header('expires:0');
            header('Cache-control: must-revalidate');
            header('Pragma: public');
            header('Content-Length:' . filesize($local_arquivo));

            // Envia o arquivo Download
            readfile($local_arquivo);
            exit;
        }
    }
}


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/listaExercicios.php';
include __DIR__ . '/../includes/admin/footer.php';

// TEM CERTEZA QUE DESEJA DELETAR?
if (!empty($delete)) {

    echo "<script> $('#modalDel').modal('show'); </script>";
}

// DELETADO COM SUCESSO
if (isset($deletado) && $deletado == true) {

    echo "<script> $('#modalSucesso').modal('show'); </script>";
}
