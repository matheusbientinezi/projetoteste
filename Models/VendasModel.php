<?php

namespace Models;

use Banco\Conexao; 
class VendasModel
{  

    public function getAll(){  

        $connect = new Conexao;
        
        $sql = "SELECT 
                    distinct(v.id),
                    c.nome,
                    v.data_cadastro,
                    (SELECT SUM(quantidade) FROM venda_itens WHERE id_venda = v.id GROUP BY id_venda) AS quantidade,
                    v.porcentagem_desconto,
                    (SELECT SUM(valor_venda * quantidade) FROM venda_itens WHERE id_venda = v.id GROUP BY id_venda) AS valor,
                    (SELECT SUM((valor_venda * quantidade))-(SUM((valor_venda * quantidade))*(v.porcentagem_desconto / 100)) FROM venda_itens WHERE id_venda = v.id GROUP BY id_venda) AS total 
                FROM venda v
                INNER JOIN venda_itens vi ON v.id = vi.id_venda
                INNER JOIN cliente c ON v.id_cliente = c.id";

        $conexao = $connect->connect();

        $vendas = $conexao->prepare($sql);
        $vendas->execute();
        return $result = $vendas->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function insertVenda(){

    }

    public function insertVendaItens(){
        
    }

    public function insertTemp($id,$quantidade){

        $connect = new Conexao;

        $sql = "INSERT INTO temp_venda VALUES(null,$id,$quantidade)";

        $conexao = $connect->connect();
        $inseretemp = $conexao->prepare($sql);
        $inseretemp->execute();
        
    }

    public function selectTemp(){

        $connect = new Conexao;

        $sql="SELECT 
                tmp.id,
                p.nome_produto,
                p.codigo_barra,
                tmp.quantidade,
                p.valor_produto,
                round((tmp.quantidade * p.valor_produto),2) AS soma 
            FROM temp_venda tmp
            INNER JOIN produto p on tmp.id_produto = p.id;
            ";

        $conexao = $connect->connect();

        $selecttemp = $conexao->prepare($sql);
        $selecttemp->execute();
        return $result = $selecttemp->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectDadosGeralTemp(){

        $connect = new Conexao;

        $sql="SELECT 
                sum(tmp.quantidade) as quantidade,
                round(SUM(tmp.quantidade * p.valor_produto),2) AS soma 
            FROM temp_venda tmp
            INNER JOIN produto p on tmp.id_produto = p.id;
            ";

        $conexao = $connect->connect();

        $selectgeraltemp = $conexao->prepare($sql);
        $selectgeraltemp->execute();
        $result = $selectgeraltemp->fetchAll(\PDO::FETCH_ASSOC);   
        return $result;
    }

    public function deleteTempVenda(){

        $connect = new Conexao;

        $sql="DELETE FROM temp_venda;
            ALTER TABLE temp_venda auto_increment = 1;";

        $conexao = $connect->connect();

        $deletetemp = $conexao->prepare($sql);
        $deletetemp->execute();

    }

}

?>