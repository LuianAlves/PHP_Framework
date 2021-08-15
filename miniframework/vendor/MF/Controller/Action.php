<?php 

    namespace MF\Controller;

    abstract class Action { // Abstract Class -> Não pode ser instanciada, somente herdada
        
        // Atributo
        protected $view;

        // Constructor
        public function __construct(){
            $this->view = new \stdClass(); // Criando o objeto vazio e atribuir ele a view || stdClass permite criar Objetos Padrões [objetos vazios que poderão ser dinamicamentes compostos de atributos durante o processamento da aplicação]
        }

        // Método Render -> Facilita o require da pasta Views
        protected function render($view, $layout) { // Adicionar $view ao parametro para ser acessado pelos outros métodos e no 2° parametro a variavel passada no 2° parametro dos outros métodos
                                        // Adicionando como 2° parametro o $layout podemos deixar de forma dinâmica a interação entre as pages e layouts

            // Recuperando o Objeto vazio [view] e atribuindo um valor ao seu atributo
            $this->view->page = $view; // No novo atributo [page] adicionar o valor de $view recebido via parametro
                                       // Atributo page auxilia em content() onde utilizamos o require em classAtual

            // Caso atribua o valor de um layout não existente, criamos uma condição para que não dê um erro

            if(file_exists("../App/Views/".$layout.".phtml")) { // file_exist() serve para verificar se determinado item existe naquele link
                                                                // Recupera a página e atraves dela o render é ativado por content() fazendo a rederezinação da página
                require_once "../App/Views/".$layout.".phtml";  // utilizando os layout podemos mudar totalmente o css da pagina
            
            } else { // Caso o Arquivo não existir, rodará apenas o $this-content() que é responsável por rederenziar o conteudo contido apenas nas views
                $this->content(); // Mostrará a view sem passar pelo layout
            }                                                  
        }

        // Método content
        protected function content() { // Herdou todo o código presente em render($view), pois o render começará a renderizar o layout

            // Atribuir o nome da Class ao require de forma dinâmica
            $classAtual = get_class($this); // get_class recupera o nome completo da class

            // Como o caminho de um controller sempre será o App\Controller, podemos retira-lo utilizar o str_replace
            $classAtual = str_replace('App\\Controllers\\', '', $classAtual); // [Atribuindo tudo á variavel $classAtual para utiliza-la de novo] 1° Recupera o diretório, 2° substitui pelo valor 'vazio' dentro da 3° string $classAtual -- Mostrará somente o nome da class Atual
            
            // Retirando o 'Controller' do nome da class -- strtoloew para deixar tudo minusculo
            $classAtual = strtolower(str_replace('Controller', '', $classAtual)); // Valor atual da variavel $classAtual é somente o nome da class sem o 'Controller'

            require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml"; // Sempre ter em base que a aplicação roda a partir do arquivo index.php, logo temos que utilizar o caminho a partir de lá
        
        }
    } 



?>