<?php

namespace App\Includes;

class Horario
{
    /**
     * Método responsável por formatar o horario do aluno para json
     */
    public function format($horarios)
    {
        $horariosFormatados = [];

        foreach ($horarios as $horario) {

            $id = $horario['id'];
            $idAluno = $horario['idAluno'];
            $title = $horario['titulo'];
            $color = $horario['cor'];
            $exercise = $horario['exercicio'];
            $description = $horario['descricao'];
            $start = $horario['inicio'];
            $end = $horario['fim'];

            $horariosFormatados[] = [
                'id' => $id,
                'idAluno' => $idAluno,
                'title' => $title,
                'color' => $color,
                'exercicio' => $exercise,
                'descricao' => $description,
                'start' => $start,
                'end' => $end,
            ];
        }
        return json_encode($horariosFormatados);
    }
}
