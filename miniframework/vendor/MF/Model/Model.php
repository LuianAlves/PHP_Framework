<?php 

    namespace MF\Model;

        class Model {

            // Atributo
            protected $db; // Atributo que receberá a conexao com o banco de dados

            // Constructor que receberá a instancia do PDO
            public function __construct($db) {
                $this->db = $db; // Recuperando o atributo $db e associando o valor recebido via parametro á ele
            }

        }

?>