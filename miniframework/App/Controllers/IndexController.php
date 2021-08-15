<?php 

    namespace App\Controllers;

    // Recursos do miniFramework
    use MF\Controller\Action;   // Importanto a class [Action]
    use MF\Model\Container;

    // Models
    use App\Models\Produto;     // Importando a class Produto 
    use App\Models\Info;     // Importando a class Info 


        class IndexController extends Action { // CLASS VINCULADA Á MF\CONTROLLER\ACTION.PHP

            // Métodos referente ás 'actions' disparadas em route.php
            public function index () {    // Incluindo as Views  
                // Criando atributos dentro do objeto vazio [view] e a partir deste momento o atributo $view passa a ter estes valores podendo ser acessado via parametro no método render('$view')
                // $this->view->dados_index = array('Sofá', 'Cadeira', 'Cama'); // -> dados_index sendo criando dentro do objeto vazio [$view]
                
                // Instanciando o Modelo [Produto]
                // Não precisa mais utilizar, pois ja foi feito a partir do Container.php // $produto = new Produto($conn); // Como parametro receber a variavel $conn que contém o valor do método getBancoDados() onde recebe a conexao em connection.php

                $produto = Container::getModel('Produto'); // Utilizar o Model-Produto como parametro | Como utilizamos o ucfirst em Container.php, podemos utilizar 'produto' como parametro tambem

                $produtos = $produto->getProdutos(); // Recebe o array de produtos de produto.php dentro de [Models]

                $this->view->dados = $produtos;  // Associando o atributo dentro do objeto vazio ao array de produtos que recebe dados do banco de dados, distribuindo para as views
                
                $this->render('index', 'layout1'); // Executando o método render() após recuperar via parametro a variavel $view e atribuindo o valor 'index' onde será utilizado o require no método render()
                                                   // Adicionando o layout como 2° parametro para que possamos dentro do contexto do 'require' no método render()
            }
            public function sobreNos () { // Incluindo as Views

                // Criando atributos dentro do objeto vazio [view] e a partir deste momento o atributo $view passa a ter estes valores podendo ser acessado via parametro no método render('$view')
                // $this->view->dados = array('Nootebook', 'Pc', 'SmartTV'); // -> dados_sn sendo criando dentro do objeto vazio [$view]


                // Não precisa mais utilizar, pois ja foi feito a partir do Container.php // $info = new Info($conn); // Como parametro receber a variavel $conn que contém o valor do método getBancoDados() onde recebe a conexao em connection.php

                $info = Container::getModel('Info'); // Utilizar o Model-Produto como parametro | Como utilizamos o ucfirst em Container.php, podemos utilizar 'produto' como parametro tambem
                
                $informacoes = $info->getInfo(); // Recebe o array de produtos de produto.php dentro de [Models]

                $this->view->dados = $informacoes;  // Associando o atributo dentro do objeto vazio ao array de produtos que recebe dados do banco de dados, distribuindo para as views
                
                $this->render('sobreNos', 'layout2'); // Executando o método render() após recuperar via parametro a variavel $view e atribuindo o valor 'sobreNos' onde será utilizado o require no método render()
                                                      // Adicionando o layout como 2° parametro para que possamos dentro do contexto do 'require' no método render()
            }               
        }

?>