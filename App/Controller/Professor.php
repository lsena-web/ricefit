<?php

namespace App\Controller;


class Professor
{
    // GERAL
    private $id, $nome, $arquivo, $email, $login, $senha, $celular;

    // SET´S GERAL
    public function setiD($id)
    {
        $this->id = $id;
    }
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // GET´S GERAL
    public function getId()
    {
        return $this->id;
    }
    public function getArquivo()
    {
        return $this->arquivo;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public  function getStatus()
    {
        return $this->status;
    }
}
