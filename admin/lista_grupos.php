<?php

require_once '../vendor/autoload.php';

$eDao = new \App\Model\ProfessorDao('grupos');

$table = $eDao->read();


// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $eDao->read('id= ' . $id);
}


// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $id = $_POST['deletar'];
    $eDao->delete('id= ' . $id); // DELETANDO informação
    header('Location:' . $_SERVER['PHP_SELF'] . '?deletado=deletado');
}



// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/lista_grupos.php';
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