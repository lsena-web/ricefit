<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('grupos');

$table = $con->read();


// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $con->read('id= ' . $id);
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


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/listaGrupos.php';
include __DIR__ . '/../includes/admin/footer.php';

// TEM CERTEZA QUE DESEJA DELETAR?
if (!empty($delete)) {

    echo "<script> $('#modalDel').modal('show'); </script>";
}

// DELETADO COM SUCESSO
if (isset($deletado) && $deletado == true) {

    echo "<script> $('#modalSucesso').modal('show'); </script>";
}
