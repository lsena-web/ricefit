<?php

require_once '../vendor/autoload.php';

use App\Session\Login;

// INICIANDO SESSÃO
Login::init();

// VERIFICANDO CHAVE
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['chave']) && !empty($_GET['chave'])) {

    // CONEXÃO
    $conexao = new \App\Model\Conexao('alunos');

    // BUSCA DE INFORMAÇÕES
    $aluno = $conexao->read('id =' . $_GET['id']);

    // VALIDANDO ID E CHAVE
    if ($aluno[0]['link'] == $_GET['chave']) {

        // SESSÃO PARA BUSCAS
        $_SESSION['link'] = [

            'id' => $aluno[0]['id']
        ];
    } else {
        // ERRO
        header('Location: ../error.html');
        exit;
    }
} else {

    // ERRO
    header('Location: ../error.html');
    exit;
}

// CONEXÃO
$con =  new \App\Model\Conexao('avaliacoes');
$con2 = new \App\Model\Conexao('configs');

// BUSCANDO INFORMAÇÃO DA ULTIMA AVALIAÇÃO
$infoInputs = $con->read('idAluno = ' . $_SESSION['link']['id'], 'id DESC', 1);

// BUSCANDO TODOS OS IMCS E SUAS DATAS DE AVALIAÇÃO
$imc = $con->read('idAluno = ' . $_SESSION['link']['id'], 'id DESC', 12, 'imc');
$label = $con->read('idAluno = ' . $_SESSION['link']['id'], 'id DESC', 12, 'dataAvaliacao');


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
$imagem = '../admin/img/' . $sexo . $number . '.png';


include __DIR__ . '/../includes/links/header.php';
include __DIR__ . '/../view/alunos/avaliacao.php';
include __DIR__ . '/../includes/links/footer.php';

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