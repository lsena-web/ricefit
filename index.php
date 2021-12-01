<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Session\Login;

Login::logadoCliente(); // verificando status do login

// auxiliares
$alertaLogin = '';

if (isset($_SESSION['tentativa'])  && !empty($_SESSION['tentativa'])) {
    $agora = date('Y-m-d H:i:s');

    $data1 = new DateTime($_SESSION['tentativa']);
    $data2 = new DateTime($agora);
    $intervalo = $data1->diff($data2); // retorna a diferenca de minutos
    $_SESSION['temporizador'] = $intervalo->format('%i');
}

if (!isset($_SESSION['quantidade'])) {
    $_SESSION['quantidade'] = 1; // a sessão quantidade começa com 1
}

// verificando envio de informações
if (isset($_POST['btnEntrar']) && !empty($_POST['btnEntrar'])) {

    // verificando se foi a primeira vez ou se ainda resta tempo para a proxima tentativa
    if (!isset($_SESSION['temporizador']) || $_SESSION['temporizador'] > 0) {

        // se a quantidade de tentativas exceder ganha a sessão ganha um min
        if (isset($_SESSION['quantidade']) && $_SESSION['quantidade'] > 2) {
            $_SESSION['tentativa'] = date('Y-m-d H:i:s');
            $_SESSION['quantidade'] = 1;
        }

        // validando dados do formulario
        if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

            $con = new \App\Model\Conexao('alunos');
            $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_EMAIL);

            $email = htmlspecialchars($dados['email']);
            $senha = htmlspecialchars($dados['senha']);

            $testeLogin = $con->read('email = ' . "'$email'");

            // email existente?
            if (!empty($testeLogin)) {
                if (password_verify($senha, $testeLogin[0]['senha'])) { // senha correta?
                    if ($testeLogin[0]['condicao'] == 's') {
                        $_SESSION['cliente'] = [
                            'id'        => $testeLogin[0]['id'],
                            'email'     => $testeLogin[0]['email'],
                            'nome'      => $testeLogin[0]['nome'],
                            'imagem'    => $testeLogin[0]['anexo'],
                            'logado'    => true,
                        ];
                        header('Location: public/home.php');
                        exit;
                    } else {
                        $alertaLogin = 'Identificação ou Senha invalidos';
                        $_SESSION['quantidade'] += 1;
                    }
                } else {
                    $alertaLogin = 'Identificação ou Senha invalidos';
                    $_SESSION['quantidade'] += 1;
                }
            } else {
                $alertaLogin = 'Identificação ou Senha invalidos';
                $_SESSION['quantidade'] += 1;
            }
        } else {
            $alertaLogin = 'Identificação ou Senha invalidos';
            $_SESSION['quantidade'] += 1;
        }
    } else {
        $alertaLogin = 'Tente em 1 min !';
    }
}

include __DIR__ . '/view/alunos/login.php';
