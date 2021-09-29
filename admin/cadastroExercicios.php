<?php
session_start();
require_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('exercicios');

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $formatosPermitidos = array("png", "jpge", "jpg", "svg", "mp4", "mkv", "avi", "wmv", "wma", "rmvb", "mov", "3gp", "flv");

    // EXTENSÃO DO ARQUIVO
    $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatosPermitidos)) {

        $pasta = "arquivos/exercicios/";
        $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";

        // UPLOAD
        move_uploaded_file($caminhoTemporario, $pasta . $novoNome);

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $cadastro = $con->create([
            'nome'    => $dados['nome'],
            'descricao' => $dados['descricao'],
            'anexo'     => $novoNome
        ]);
    } else {

        $_SESSION['arquivo'] = 'Arquivo Inválido';
        $_SESSION['value_nome'] = $_POST['nome'];
        $_SESSION['value_narrativa'] = $_POST['descricao'];

        header('Location' . $_SERVER['PHP_SELF']);
    }
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/cadastroExercicios.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($cadastro)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>