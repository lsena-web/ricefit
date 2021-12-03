<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

Login::loginCliente();




include __DIR__ . '/../includes/alunos/header.php';
include __DIR__ . '/../view/alunos/principal.php';
include __DIR__ . '/../includes/alunos/footer.php';
