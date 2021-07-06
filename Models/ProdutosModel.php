<?php

namespace Models;

use Banco\Conexao;

class ProdutosModel
{

    public function getAll()
    {

        $connect = new Conexao;

        $sql = "SELECT id, nome_produto, codigo_barra, replace(valor_produto,'.',',') as valor_produto, estoque, data_cadastro FROM produto";

        $conexao = $connect->connect();

        $produtos = $conexao->prepare($sql);
        $produtos->execute();
        return $result = $produtos->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertProduto($nome_produto, $codigo_barra, $valor_venda, $estoque)
    {

        $connect = new Conexao;

        $sql = "INSERT INTO produto VALUES(null,'$nome_produto','$codigo_barra',$valor_venda,$estoque,now())";

        $conexao = $connect->connect();

        $produto = $conexao->prepare($sql);
        $produto->execute();
    }

    public function buscaProdId($produto_id)
    {
        $connect = new Conexao;

        $sql = "SELECT * FROM produto WHERE id = $produto_id";

        $conexao = $connect->connect();

        $produto = $conexao->prepare($sql);
        $produto->execute();
        return $result = $produto->fetch(\PDO::FETCH_ASSOC);
    }
}
