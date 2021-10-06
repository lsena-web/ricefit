<?php

require_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('alunos');
$geral = new \App\Controller\Geral();

$table =  $con->read();
$caminho = "arquivos/alunos/";

// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $con->read('id= ' . $id);
}

// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $id = $_POST['deletar'];
    $arquivo = $con->read('id=' . $id);

    $pasta = "arquivos/alunos/";
    if (!empty($arquivo)) { // DELETANDO ARQUIVO
        foreach ($arquivo as $v) {
            unlink($pasta . "/" . $v['anexo']);
        }
    }
    $con->delete('id= ' . $id); // DELETANDO informação

    header('Location:' . $_SERVER['PHP_SELF'] . '?deletado=deletado');
}

// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}


// forçando download
if (isset($_GET['file']) and !empty($_GET['file']) and is_numeric($_GET['file'])) {

    $pasta = "arquivos/alunos/";
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
            header('Content-Disposition: attachment; filename=' . basename('aluno.' . $extensao));
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
include __DIR__ . '/../view/admin/listaAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (!empty($delete)) { ?>
    <script>
        $('#modalDel').modal('show');
    </script>
<?php }
if (isset($_GET['deletado']) and !empty($_GET['deletado'])) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>