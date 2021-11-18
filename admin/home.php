<?php

include_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();




include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/home.php';
include __DIR__ . '/../includes/admin/footer.php';
