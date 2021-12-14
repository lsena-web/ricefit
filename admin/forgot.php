<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

$mail = new PHPMailer(true);
$alerta = '';


if (isset($_POST['btnEnviar']) && !empty($_POST['btnEnviar'])) {

    $USER = 'contato@clfitness.net.br';
    $PASS = 'camillaCl$28';

    // CONEXÃO
    $con   = new \App\Model\Conexao('admin');

    // FILTRANDO INPUT
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // BUSCANDO E-MAIL
    $busca = $con->read('email = ' . "'$email'", null, null, 'id, email, nome');


    // VALIDANDO EXISTENCIA DO E-MAIL
    if (!empty($busca)) {
        $informa['id'] = $busca[0]['id'];
        $informa['nome'] = $busca[0]['nome'];
        $informa['email'] = $busca[0]['email'];
    }


    if (isset($informa) && !empty($informa)) {
        $chave = password_hash($informa['id'], PASSWORD_DEFAULT);
        $atualizacao = '';

        // ATUALIZA O CAMPO "RECOVER" DA TABELA
        if (!empty($busca)) {
            $atualizacao = $con->update('id= ' . $informa['id'], ['recover' => $chave]);
        }


        if ($atualizacao ==  true) {
            $link = 'https://clfitness.net.br/admin/recover.php?chave=' . $chave;
            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();
                $mail->Host       = 'smtp.titan.email';
                $mail->SMTPAuth   = true;
                $mail->Username   = $USER;
                $mail->Password   = $PASS;
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                //Recipients
                $mail->setFrom($USER, 'noreply');
                $mail->addAddress($informa['email'], $informa['nome']);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Recuperar Senha';
                $mail->Body    = 'Prezado(a) ' . $informa['nome'] . ".<br><br>Você solicitou a alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha clique no link abaixo ou cole o endereço no seu navegador: <br><br> <a href='" . $link . "'>Clique Aqui!</a><br><br> se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha será a mesma até que você ative este código.<br><br>";
                $mail->AltBody = 'Prezado(a) ' . $informa['nome'] . ".\n\nVocê solicitou a alteração de senha.\n\nPara continuar o processo de recuperação de sua senha clique no link abaixo ou cole o endereço no seu navegador: \n\n " . $link . "\n\n se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha será a mesma até que você ative este código.\n\n";
                $mail->send();
            } catch (Exception $e) {
                $alerta = 'Solicitação realizada com <b>sucesso!</b> <br> verifique sua caixa de <b>e-mail</b> para mais detalhes.';
            }
        }
        // resetando informações
        $informa = '';
        $chave = '';
        $alerta = 'Solicitação realizada com <b>sucesso!</b> <br> verifique sua caixa de <b>e-mail</b> para mais detalhes.';
    }
}


include __DIR__ . '/../includes/links/header.php';
include __DIR__ . '/../view/admin/forgot.php';
include __DIR__ . '/../includes/links/footer.php';
