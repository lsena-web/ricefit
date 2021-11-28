<?php
require_once '../vendor/autoload.php';

use App\Session\Login;

Login::login();

// ARMAZENANDO INFORMAÇÕES DO ALUNO NA SESSÃO
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $aluno = new \App\Model\Conexao('alunos');
    $id = $_GET['id'];
    $infoAluno = $aluno->read('id = ' . $id);

    $_SESSION['grafico'] = [
        'id'    => $infoAluno[0]['id'],
        'nome'  => $infoAluno[0]['nome'],
        'email' => $infoAluno[0]['email'],
        'sexo'  => $infoAluno[0]['sexo']
    ];
}

// CONEXÃO
$con =  new \App\Model\Conexao('avaliacoes');
$con2 = new \App\Model\Conexao('configs');

// BUSCANDO INFORMAÇÃO DA ULTIMA AVALIAÇÃO
$infoInputs = $con->read('idAluno = ' . $_SESSION['grafico']['id'], 'id DESC', 1);

// BUSCANDO TODOS OS IMCS E SUAS DATAS DE AVALIAÇÃO
$imc = $con->read('idAluno = ' . $_SESSION['grafico']['id'], 'dataAvaliacao DESC', 12, 'imc');
$label = $con->read('idAluno = ' . $_SESSION['grafico']['id'], 'dataAvaliacao DESC', 12, 'dataAvaliacao');


// AUXILIARES
$formatImc = [];
$formatLabel = [];
$imcs = [];
$labels = [];

// QUANTIDADE DE REGISTROS
$quantidadeImc = count($imc);
$quantidadeLabel = count($label);

// PASSANDO O ULTIMO ELEMENTO DO ARRAY PARA O INICIO DE OUTRO ARRAY
for ($i = 1; $i <= $quantidadeImc; $i++) {

    $formatImc[] = array_pop($imc);
}

for ($i = 0; $i < $quantidadeLabel; $i++) {

    $formatLabel[] = array_pop($label);
}

// TRANSFORMANDO ARRAY ASSOCIATIVO EM ARRAY
for ($i = 0; $i < $quantidadeImc; $i++) {

    foreach ($formatImc[$i] as $value) {
        $imcs[] = $value;
    }
}

for ($i = 0; $i < $quantidadeLabel; $i++) {

    foreach ($formatLabel[$i] as $value) {
        $labels[] =  date('d/m/Y', strtotime($value));
    }
}

// TRANFORMANDO ARRAY EM JSON
$jsonImc = json_encode($imcs);
$jsonLabel = json_encode($labels, JSON_UNESCAPED_SLASHES);

// PASSANDO INFORMAÇÕES PARA O GRÁFICO
echo '<script> const imcs =' . $jsonImc . '</script>';
echo '<script> const labels =' . $jsonLabel . '</script>';


// AUXILIARES
$sexo   = '';
$number = '';
$grau   = '';
$aviso  = '';
$imc    = '';

// buscando informações de imc
$avisos = $con2->read();

if ($_SESSION['avaliacao']['sexo'] == 'm') {
    $sexo = 'man';
} else {
    $sexo = 'woman';
}

if ($infoInputs[0]['imc'] < 18.5) {
    $number = 1;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Abaixo do Peso';
    $aviso  = $avisos[0]['magreza'];
} elseif ($infoInputs[0]['imc'] >= 18.5 || $infoInputs[0]['imc'] <= 24.9) {
    $number = 2;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Peso Normal';
    $aviso  = $avisos[0]['normal'];
} elseif ($infoInputs[0]['imc'] >= 25 || $infoInputs[0]['imc'] <= 29.9) {
    $number = 3;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Sobrepeso';
    $aviso  = $avisos[0]['sobrepeso'];
} elseif ($infoInputs[0]['imc'] >= 30 || $infoInputs[0]['imc'] <= 39.9) {
    $number = 4;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Obesidade';
    $aviso  = $avisos[0]['obesidade'];
} else {
    $number = 5;
    $imc    = $infoInputs[0]['imc'];
    $grau   = 'Obesidade grave';
    $aviso  = $avisos[0]['obesidadeGrave'];
}

// imagem relacionada ao imc
$imagem = 'img/' . $sexo . $number . '.png';






include __DIR__ . '/../includes/admin/header.php';
include __DIR__ . '/../includes/admin/side.php';
include __DIR__ . '/../view/admin/grafico.php';
include __DIR__ . '/../includes/admin/footer.php';

?>



<script>
    $(function() {

        const data = {
            labels: labels,
            datasets: [{
                label: 'Relação de IMC',
                borderColor: 'rgb(255, 99, 132)',
                data: imcs,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('lineChart'),
            config
        );

    })
</script>