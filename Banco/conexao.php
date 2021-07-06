<?php

namespace Banco;

class Conexao

{
    public function connect()
    {

        $pdo = new \PDO('mysql:dbname=mb;host=localhost', 'root', '');
        return $pdo;
    }

    public function teste()
    {

        $nome = 'Matheus';
        return $nome;
    }
}
