<?php

    namespace App\Models;

    use MF\Model\Model;

    class Produto extends Model {       
        // Método utilizado em indexController
        public function getProdutos() {
           
            $query = "
                SELECT
                    id, descricao, preco
                FROM
                    tb_produtos
            ";

            return $this->db->query($query)->fetchAll(); // Executar o metodo query contida dentro da instancia do PDO que está associada ao atributo db de Produto
            // Retorna o PDO statement || Encaminhando atraves do fetchAll um array de todos os registros
        }
    }


?>