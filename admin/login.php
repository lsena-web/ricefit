<?php

include_once '../vendor/autoload.php';



if (isset($_POST['btnEntrar']) && !empty($_POST['btnEntrar'])) {

    header('Location:home.php');
}




include __DIR__ . '/../view/admin/login.php';
