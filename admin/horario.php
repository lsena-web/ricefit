<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Session\Login;

Login::init();

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

// Conexão com a tabela horarios
$con = new \App\Model\Conexao('horarios');

// Conexão com a tabela exercicios
$con2 = new \App\Model\Conexao('exercicios');

// buscando exercicios
$exercicios = $con2->read();

// CADASTRO
if (isset($_POST['btnCadastro']) && !empty($_POST['btnCadastro'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // convertendo datas para o formato do banco de dados  dateTime
    $conversorStart = str_replace('/', '-', $dados['start']);
    $start = date("Y-m-d H:i:s", strtotime($conversorStart));

    $conversorEnd = str_replace('/', '-', $dados['end']);
    $end = date("Y-m-d H:i:s", strtotime($conversorEnd));

    $cadastro = $con->create([
        'idAluno'   => $dados['idAluno'],
        'titulo'    => $dados['titulo'],
        'cor'       => $dados['cor'],
        'exercicio' => $dados['exercicio'],
        'descricao' => $dados['descricao'],
        'inicio'    => $start,
        'fim'       => $end
    ]);
}

// UPDATE
if (isset($_POST['btnEditar']) && !empty($_POST['btnEditar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // convertendo datas para o formato do banco de dados  dateTime
    $conversorStart = str_replace('/', '-', $dados['inicio']);
    $start = date("Y-m-d H:i:s", strtotime($conversorStart));

    $conversorEnd = str_replace('/', '-', $dados['fim']);
    $end = date("Y-m-d H:i:s", strtotime($conversorEnd));

    $i->setTitulo($dados['titulo']);
    $i->setCor($dados['cor']);
    $i->setInicio($start);
    $i->setFim($end);
    $i->setiD($dados['codigo']);

    $update = $iDao->updateEventosCalendario($i);
}


// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $iDao->readEventosCalendarioId($id);
}

// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $id = $_POST['deletar'];
    $iDao->deleteEventosCalendario($id); // DELETANDO informação

    header('Location:' . $_SERVER['PHP_SELF'] . '?deletado=deletado');
}

// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}


include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/horario.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($cadastro) && !empty($cadastro)) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}

if (isset($update)) { ?>
    <script>
        $('#modalEdit').modal('show');
    </script>
<?php  }
if (!empty($delete)) { ?>
    <script>
        $('#modalDel').modal('show');
    </script>
<?php }
if (isset($_GET['deletado']) and !empty($_GET['deletado'])) { ?>
    <script>
        $('#modalDelSucesso').modal('show');
    </script>
<?php  } ?>