<?php
require_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('alunos');
$grupos = new \App\Model\Conexao('grupos');
$gp = $grupos->read();
$alertaLogin    = '';
$alertaArquivo  = '';

$inputNome      = '';
$inputEmail     = '';
$inputCelular   = '';
$inputLogin     = '';
$inputSenha     = '';
$inputDescricao = '';

if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $login = $dados['login'];
    $testeLogin = $con->read('login = ' . "'$login'");


    if (!empty($testeLogin)) { // email, login, cpf
        $alertaLogin = 'Login: ' . $login . ' já está em uso!';

        $inputNome      = $dados['nome'];
        $inputEmail     = $dados['email'];
        $inputCelular   = $dados['celular'];
        $inputSenha     = $dados['senha'];
    } else {

        $anexo = [];

        $formatosPermitidos = array("png", "jpge", "jpg", "svg", "gif");

        // EXTENSÃO DO ARQUIVO
        $extensao = PATHINFO($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        if (in_array($extensao, $formatosPermitidos)) {

            $pasta = "arquivos/alunos/";
            $caminhoTemporario = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid() . ".$extensao";
            $anexo['anexo'] = $novoNome;

            // UPLOAD
            move_uploaded_file($caminhoTemporario, $pasta . $novoNome);

            $senhaSegura = password_hash($dados['senha'], PASSWORD_DEFAULT);

            $cadastro = $con->create([
                'nome'    => $dados['nome'],
                'login'    => $dados['login'],
                'senha'    => $senhaSegura,
                'email'    => $dados['email'],
                'celular'    => $dados['celular'],
                'descricao' => $dados['descricao'],
                'turma' => $dados['turma']
            ] + $anexo);
        } else {

            $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';

            $inputNome      = $dados['nome'];
            $inputEmail     = $dados['email'];
            $inputCelular   = $dados['celular'];
            $inputLogin     = $dados['login'];
            $inputSenha     = $dados['senha'];
            $inputDescricao = $dados['descricao'];
        }
    }
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/cadastroAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';

if (isset($cadastro)) { ?>
    <script>
        $('#modalSucesso').modal('show');
    </script>
<?php  } ?>