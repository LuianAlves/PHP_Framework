<?php 

    require_once "../vendor/autoload.php"; // Require do arquivo autoload que será responsável pelo carregamento automatico de todas as classes do projeto

    // Instancia do Objeto [Route] utilizando o namespace contido no script do diretório raiz [\App]
    $route = new \App\Route;
    
    // print_r($route->getUrl()); // Utilizando o método getUrl() dentro do Objeto [Route] para obter a url do usuario

?>