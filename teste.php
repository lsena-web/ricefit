<?php

$data = '2021-05-21';
$data2 = '2021-05-22';

if (strtotime($data) > strtotime($data2)) {
    echo 'essa data: ' . $data . ' é maior';
}

$data3 = '02/12/2021';
$data4 = '03/12/2021';

echo $dia = substr($data3, 0, 2);
echo '<br>';
echo $mes = substr($data3, 3, 2);
echo '<br>';
echo $ano = substr($data3, 6, 4);

if (checkdate($mes, $dia, $ano)) {

    echo '<br>';
    echo 'data válida';
} else {
    echo '<br>';
    echo 'data inválida';
}
