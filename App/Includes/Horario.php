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

            $id             = $horario['id'];
            $idAluno        = $horario['idAluno'];
            $title          = $horario['titulo'];
            $color          = $horario['cor'];
            $anexo          = $horario['anexo'];
            $exercise       = $horario['exercicio']; // ID DO EXERCICIO
            $nome           = $horario['nome']; // NOME DO EXERCICIO
            $description    = $horario['descricao'];
            $start          = $horario['inicio'];
            $end            = $horario['fim'];

            $horariosFormatados[] = [
                'id'        => $id,
                'idAluno'   => $idAluno,
                'title'     => $title,
                'color'     => $color,
                'exercicio' => $exercise,
                'nome'      => $nome,
                'anexo'     => "arquivos/exercicios/" . $anexo,
                'descricao' => $description,
                'start'     => $start,
                'end'       => $end,
            ];
        }
        return json_encode($horariosFormatados);
    }
}
