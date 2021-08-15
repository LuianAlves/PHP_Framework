<?php
    // <!-- Não tem nada a ver com CSS -->

    namespace MF\Init;
    
    // Abstract Class -> Não pode ser instanciada, somente herdada
    abstract class Bootstrap {

        // Atributo
        private $routes;

        // Método Abstrato - Mesmo nome do existente em route.php
        abstract protected function initRoutes(); // Quando nós definimos um método abstrato significa que este método quando herdado pela class [Filha] deverá ser implementado na class [Filha]


        // Constructor - Construir o Objeto
        public function __construct() { // Será executado no momento em que a instancia de um Objeto for feita com base nessa Class [Route] - [Ocorrenco em index.php onde há a instancia do Objeto [Route] ]
            $this->initRoutes();
            $this->run($this->getUrl()); // Encaminhando o 'path = url' que está o usuário como [parametro getUrl] para o método run
        }

        // Métodos GET e SET para manipular o atributo private
        public function getRoutes() {
            return $this->routes; // retornar o atributo como public
        }
        public function setRoutes(array $routes) { // Parametro array de rotas
            $this->routes = $routes; // Recupera o atributo routes e associa o parametro á ele routes = [$routes - parametro]
        }

        // Executar a Rota
        protected function run($url) { // Primeira impressão na página -- Método protected mas pode ser herdado

            foreach($this->getRoutes() as $indice => $route) { // $this-getRoutes() recupera o atributo $routes | $indice[key] o indice/path/url dos array [home, sobre_nos ...] | $route[value] os valores associados aos indices [home, sobrenos ....]
                
                // Se for identificado que a $url digitada pelo usuario for [sobre_nos], foreach acessará o array de rotas, vamos verificar em cada indice do array se a url recebida [sobre_nome]
                // é compativel com o atributo $route['route'] de cada um dos arrays internos, se for compativel entraremos na condição do IF e então vamos instanciar a $class de forma dinamica e o disparo do método action()

                if ($url == $route['route']) { // Verificando se a url/path que o usuário está é igual á variavel $route no indice ['route']
                    
                    // $class recupera a variavel $route e acessar o index ['controller'] que contém o nome da class que vamos instanciar
                    $class = "App\\Controllers\\" . ucfirst($route['controller']); // ucfirst -> define o primeiro caracter da string seja maiusculo, pois o controller se chama IndexController e no método initRoute 'controller' => indexController
                    
                    // Instanciando a variavel $class
                    $controller = new $class; // É o mesmo que $controller = new App\Controllers\IndexController

                    $action = $route['action']; // Recuperando os valores de 'action' 

                    $controller->$action(); // Utilizar () para o PHP reconhecer que precisa disparar este método

                }
            }
        }

        // Método vinculado á URL - Recuperar a url em que o usuario está -- Método protected mas pode ser herdado
        protected function getUrl() { // Retorna a URL corrente do usuário, ou seja, a URL que o usuário está acessando atualmente
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Utilizando a função parse_url ela testa tudo que está entre () retorna um array com os componentes da URL
                                                                    // Para obter somente a URL sem o array, utilizamos o PHP_URL_PATH que retorna apenas o valor da URL sem o array
        }
    }
       
?>
