<?php 
    // Este arquivo Route.php será o responsável pelo funcionamento do Controller, ou seja, qual ação será disparada
    
    // Namespace definido dentro do arquivo composer.json
    namespace App; // Como route.php está dentro do diretório [App], seguindo a especificação PSR-4 [Definida no arquivo composer.json] ela espera que um script dentro de um determinado diretório contenha um namespace compativel com aquele respectivo diretório

    // Importanto a class [Bootstrap]
    use MF\Init\Bootstrap;

    // Objeto [Route]
    class Route extends Bootstrap { // CLASS VINCULADA Á MF\INIT\BOOTSTRAP.PHP
        
        // Método vinculado aos CONTROLLERS
        protected function initRoutes() { // Denifindo os Controllers e criando um array de rotas
            // Arrays
            $routes['home'] = array (               // Quando a rota digitado ou solicitada for a 'raiz' definimos o indexController como respectivo controllador e lá dentro [indexController] a ação index será disparada
                'route' => '/',                     // Associando a rota raiz [/] ao indice 'route'
                'controller' => 'indexController',  // Definindo o Controller
                'action' => 'index'                 // Ação disparada dentro do controllador quando está rota for requisitada 
            );

            $routes['sobre_nos'] = array(
                'route' => '/sobre_nos',            // Associando a rota raiz [/sobre_nos] ao indice 'route'
                'controller' => 'indexController',  // Definindo o Controller
                'action' => 'sobreNos'             // Ação disparada dentro do controllador quando está rota for requisitada 
            );

            $this->setRoutes($routes); // Atribuindo o valor deste método ao atributo $routes
        }        
    }

    // Instancia do Objeto [Route] será feita no arquivo index.php

?>
