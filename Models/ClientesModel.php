<?php

namespace Models;

use Banco\Conexao;

class ClientesModel
{

    public function getAll()
    {

        $connect = new Conexao;

        $sql = "SELECT * FROM cliente";

        $conexao = $connect->connect();

        $clientes = $conexao->prepare($sql);
        $clientes->execute();
        return $result = $clientes->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertCliente($nome, $sobrenome, $celular, $cpf)
    {

        $connect = new Conexao;

        $sql = "INSERT INTO cliente VALUES(null,'$nome','$sobrenome','$celular','$cpf',now())";

        // echo '<pre>';
        // var_dump($sql);
        // exit;

        $conexao = $connect->connect();

        $cliente = $conexao->prepare($sql);
        $cliente->execute();
    }
}
