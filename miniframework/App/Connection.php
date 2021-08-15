<?php 
    namespace App;

    class Connection {
        public static function getDb() { // Definindo como metodo static para facilitar a instancia no indexController
            try {

                $conn = new \PDO ( // Utilizar a \ antes do PDO para indicar que o namespace é a raiz 
                    'mysql:host=localhost;port=3308;dbname=db_mvc;charset=utf8',
                    'root',
                    ''
                );

                return $conn;

            } catch (\PDOException $erro) { 
                // Tratando o erro caso necessário
            }
        }
    }

?>