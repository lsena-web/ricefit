<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Session\Login;

Login::login();

// ID DO ALUNO ARMAZENADO EM UM SESSÃO
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $aluno = new \App\Model\Conexao('alunos');
    $id = $_GET['id'];
    $infoAluno = $aluno->read('id = ' . $id);

    $_SESSION['horario'] = [
        'id' => $infoAluno[0]['id'],
        'nome' => $infoAluno[0]['nome'],
        'email' => $infoAluno[0]['email']
    ];
}

// Conexão com a tabela horarios
$con = new \App\Model\Conexao('horarios');

// Conexão com a tabela exercicios
$con2 = new \App\Model\Conexao('exercicios');

// buscando exercicios
$exercicios = $con2->read();

// AUXILIAR
$alerta = '';

// CADASTRO
if (isset($_POST['btnCadastro']) && !empty($_POST['btnCadastro'])) {

    // DADOS DOS INPUTS
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // AUXILIARES
    $data = '';
    $data1 = '';

    // REPARTINDO DATA DE INICIO
    $dia = substr($dados['start'], 0, 2);
    $mes = substr($dados['start'], 3, 2);
    $ano = substr($dados['start'], 6, 4);

    // REPARTINDO DATA DE FIM
    $dia1 = substr($dados['end'], 0, 2);
    $mes1 = substr($dados['end'], 3, 2);
    $ano1 = substr($dados['end'], 6, 4);

    // VALIDANDO DATA INICIO
    if (checkdate($mes, $dia, $ano)) {
        $data = true;
    }

    // VALIDANDO DATA FIM
    if (checkdate($mes1, $dia1, $ano1)) {
        $data1 = true;
    }

    if ($data == true && $data1 == true) {
        // CONVERTENDO DATAS PARA O FORMATO DO BANCO DE DADOS
        $conversorStart = str_replace('/', '-', $dados['start']);
        $start = date("Y-m-d H:i:s", strtotime($conversorStart));

        $conversorEnd = str_replace('/', '-', $dados['end']);
        $end = date("Y-m-d H:i:s", strtotime($conversorEnd));

        // VERIFICANDO SE A DATA DE INICIO NÃO É SUPERIOR A DE TERMINO
        if ($start < $end) {

            // RESETANDO ALERTA
            $alerta = '';

            // CADASTRANDO INFORMAÇÕES
            $cadastro = $con->create([
                'idAluno'   => $dados['idAluno'],
                'titulo'    => $dados['titulo'],
                'cor'       => $dados['cor'],
                'exercicio' => $dados['exercicio'],
                'descricao' => $dados['descricao'],
                'inicio'    => $start,
                'fim'       => $end
            ]);
        } else {

            $alerta = 'Erro! a data de INÍCIO não pode ser superior a data de TERMINO';
        }
    } else {

        $alerta = 'Data inválida!';
    }
}

// ATUALIZAÇÃO
if (isset($_POST['btnEditar']) && !empty($_POST['btnEditar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // AUXILIARES
    $anexo  = [];
    $data   = '';
    $data1  = '';

    // REPARTINDO DATA DE INICIO
    $dia = substr($dados['inicio'], 0, 2);
    $mes = substr($dados['inicio'], 3, 2);
    $ano = substr($dados['inicio'], 6, 4);

    // REPARTINDO DATA DE FIM
    $dia1 = substr($dados['fim'], 0, 2);
    $mes1 = substr($dados['fim'], 3, 2);
    $ano1 = substr($dados['fim'], 6, 4);

    // VALIDANDO DATA INICIO
    if (checkdate($mes, $dia, $ano)) {
        $data = true;
    }

    // VALIDANDO DATA FIM
    if (checkdate($mes1, $dia1, $ano1)) {
        $data1 = true;
    }

    if ($data == true && $data1 == true) {
        // CONVERTENDO DATAS PARA O FORMATO DO BANCO DE DADOS
        $conversorStart = str_replace('/', '-', $dados['inicio']);
        $start = date("Y-m-d H:i:s", strtotime($conversorStart));

        $conversorEnd = str_replace('/', '-', $dados['fim']);
        $end = date("Y-m-d H:i:s", strtotime($conversorEnd));

        // VERIFICANDO SE A DATA DE INICIO NÃO É SUPERIOR A DE TERMINO
        if ($start < $end) {

            // VERIFICANDO SE O EXERCICIO FOI ATUALIZADO
            if (isset($dados['exercicio']) && !empty($dados['exercicio'])) {
                $anexo['exercicio'] = $dados['exercicio'];
            }

            // RESETANDO ALERTA
            $alerta = '';

            // ATUALIZANDO INFORMAÇÕES
            $atualizacao = $con->update('id= ' . $dados['codigo'], [
                'titulo'    => $dados['titulo'],
                'cor'       => $dados['cor'],
                'descricao' => $dados['descricao'],
                'inicio'    => $start,
                'fim'       => $end,
            ] + $anexo);
        } else {

            $alerta = 'Erro! a data de INÍCIO não pode ser superior a data de TERMINO';
        }
    } else {

        $alerta = 'Data inválida!';
    }
}


// BUSCAR INFORMAÇÃO ANTES DO DELETE INFORMAÇÃO
if (isset($_GET['del']) and !empty($_GET['del']) and is_numeric($_GET['del'])) {

    $id = $_GET['del'];
    $delete = $con->read('id= ' . $id);
}

// DELETAR INFORMAÇÃO
if (isset($_POST['btnDel']) and !empty($_POST['btnDel'])) {

    $id = $_POST['deletar'];
    $arquivo = $con->read('id=' . $id);

    $deletado = $con->delete('id= ' . $id); // DELETANDO informação

    header('Location:' . $_SERVER['PHP_SELF'] . '?deletado=deletado');
}

// CANCELAR AÇÃO DE DELETE
if (isset($_POST['btnClose']) and !empty($_POST['btnClose'])) {

    header('Location:' . $_SERVER['PHP_SELF']);
}

// INCLUDES
include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/horario.php';
include __DIR__ . '/../includes/admin/footer.php';

// CHAMANDO MODAL CONFIRMANDO O CADASTRO
if (isset($cadastro) && !empty($cadastro)) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}

// CHAMANDO MODAL CONFIRMANDO A ATUALIZAÇÃO
if (isset($atualizacao) && !empty($atualizacao)) {
    echo "<script> $('#modalEdit').modal('show'); </script>";
}

// CHAMANDO MODAL DE CONFIRMAÇÃO DE DELETE
if (!empty($delete)) {
    echo "<script> $('#modalDel').modal('show'); </script>";
}

// CHAMANDO TOAST CONFIRMANDO O DELETE
if (isset($_GET['deletado']) && !empty($_GET['deletado'])) {

    echo
    "<script>
        $(function() {
            document.Toast.fire({icon: 'success',title: ' Informação deletada com suscesso!'}); 
        });
     </script>";
}
