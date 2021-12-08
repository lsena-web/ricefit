<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

$con = new \App\Model\Conexao('exercicios');

// AUXILIARES
$alerta    = '';
$nome      = '';
$descricao = '';

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {


    // FILTRANDO INPUTS
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // VERIFICANDO CAMPO DESCRIÇÃO
    if (!empty($dados['descricao'])) {

        $formatosPermitidos = array("png", "jpge", "jpg", "svg", "mp4", "mkv", "avi", "wmv", "wma", "rmvb", "mov", "3gp", "flv", "gif");

        // EXTENSÃO DO ARQUIVO
        $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        // VALIDANDO EXTENSÃO
        if (in_array($extensao, $formatosPermitidos)) {

            $pasta = "arquivos/exercicios/";
            $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid() . ".$extensao";

            // UPLOAD
            move_uploaded_file($caminhoTemporario, $pasta . $novoNome);

            // CADASTRANDO INFORMAÇÕES
            $cadastro = $con->create([
                'nome'      => $dados['nome'],
                'descricao' => $dados['descricao'],
                'anexo'     => $novoNome
            ]);
        } else {

            $alerta    = 'Arquivo Inválido!';
            $nome      = $_POST['nome'];
            $descricao = $_POST['descricao'];
        }
    } else {

        $alerta    = 'O campo descrição é obrigatório :)';
        $nome      = $_POST['nome'];
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