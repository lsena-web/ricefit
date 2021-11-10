<?php
require_once '../vendor/autoload.php';

$con = new \App\Model\Conexao('alunos');

$grupos = new \App\Model\Conexao('grupos');

$gp = $grupos->read();

// VARIÁVEIS AUXILIARES
$alertaArquivo  = '';
$alertaEmail    = '';

$inputNome      = '';
$inputEmail     = '';
$inputCelular   = '';
$inputSenha     = '';
$inputDescricao = '';

// CADASTRO
if (isset($_POST['btnSalvar']) && !empty($_POST['btnSalvar'])) {


    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $email = $dados['email'];
    $testeEmail = $con->read('email = ' . "'$email'");

    // VERIFICANDO SE O EMAIL JA SE ENCONTRA EM USO
    if (!empty($testeEmail)) { // email, login, cpf
        $alertaEmail = 'E-mail: ' . $email . ' já está em uso!';

        $inputNome      = $dados['nome'];
        $inputCelular   = $dados['celular'];
        $inputSenha     = $dados['senha'];
    } else {

        $anexo = [];

        $formatosPermitidos = array("png", "jpeg", "jpg", "svg", "gif");

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
            $celular = preg_replace('/\D/', '', $dados['celular']);

            $cadastro = $con->create([
                'nome'      => $dados['nome'],
                'senha'     => $senhaSegura,
                'email'     => $dados['email'],
                'celular'   => $dados['celular'],
                'descricao' => $dados['descricao'],
                'turma'     => $dados['turma']
            ] + $anexo);
        } else {

            $alertaArquivo  = 'Arquivo Inválido! Escolha um arquivo com formato permitido.';

            $inputNome      = $dados['nome'];
            $inputEmail     = $dados['email'];
            $inputCelular   = $dados['celular'];
            $inputSenha     = $dados['senha'];
            $inputDescricao = $dados['descricao'];
        }
    }
}

include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/cadastroAlunos.php';
include __DIR__ . '/../includes/admin/footer.php';

// OPERAÇÃO REALIZADA COM SUCESSO
if (isset($cadastro) && !empty($cadastro)) {
    echo "<script> $('#modalSucesso').modal('show'); </script>";
}

// ERRO NA OPERAÇÃO
if (isset($cadastro) && !is_numeric($cadastro)) {
    echo
    "<script>
        $(function() {
            document.Toast.fire({icon: 'error',title: ' Erro, tente novamente!'}); 
        });
     </script>";
}
