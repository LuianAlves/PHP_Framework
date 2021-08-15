<?php 

    namespace MF\Model;

    use App\Connection; // Importanto a conexao com PDO
        
        class Container {

            // Método Estático não precisa criar uma instancia da class
            public static function getModel($model) { // Recebe o Model e a partir do Model passado para este Objeto [Container] vamos realizar a instancia da conexão

                $class = "\\App\\Models\\" . ucfirst($model);

                // Criando uma instancia estatica para a conexao do PDO
                $conn = Connection::getDb(); // Recebebe a $conexao do PDO via o ('return' de lá)

                return new $class($conn); // Passando a conexao [conn] como parametro

            }
        }


?>