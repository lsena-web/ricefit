<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();


// ARMAZENANDO INFORMAÇÕES DO ALUNO NA SESSÃO
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $aluno = new \App\Model\Conexao('alunos');
    $id = $_GET['id'];
    $infoAluno = $aluno->read('id = ' . $id);

    $_SESSION['avaliacao'] = [
        'id'    => $infoAluno[0]['id'],
        'nome'  => $infoAluno[0]['nome'],
        'email' => $infoAluno[0]['email'],
        'sexo'  => $infoAluno[0]['sexo']
    ];
}

// CONEXÃO COM A TABELA AVALIAÇÕES
$con = new \App\Model\Conexao('avaliacoes');

// INFORMAÇÕES PARA A TABELA
$table = $con->read('idAluno = ' . $_SESSION['avaliacao']['id']);

// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $con->read('id = ' . $id);
}


// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $delete = ''; // omitindo modal delete pós confirmação

    $id = $_POST['deletar'];
    $deletado = $con->delete('id= ' . $id); // DELETANDO informação
}

// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}



// forçando download
if (isset($_GET['file']) and !empty($_GET['file']) and is_numeric($_GET['file'])) {

    $pasta = "institucionalArquivo/legislacao/leis/";
    $id = addslashes($_GET['file']);
    $dados = $con->read('id = ' . $id);

    foreach ($dados as $v) {
        $local_arquivo = $pasta . '/' . $v['anexo'];
    }

    $nomeArquivo = 'leis portal da transparencia';


    if (isset($local_arquivo)) {
        if (file_exists($local_arquivo)) {
            header('Content-Type: application/octet-stream');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=' . basename($nomeArquivo . '.pdf'));
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
include __DIR__ . '/../view/admin/lista_avaliacoes.php';
include __DIR__ . '/../includes/admin/footer.php';

// TEM CERTEZA QUE DESEJA DELETAR?
if (!empty($delete)) {

    echo "<script> $('#modalDel').modal('show'); </script>";
}

// DELETADO COM SUCESSO
if (isset($deletado) && $deletado == true) {

    echo "<script> $('#modalSucesso').modal('show'); </script>";
}
