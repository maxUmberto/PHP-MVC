<?php

    class HomeController{
        public function index(){
            try{
                //Chama a função seleciona todos que está no arquivo Postagem.php e salva o retorno na variável $postagem
                $postagens = Postagem::selecionaTodos();

                //Aqui entra a mágica do Twig. Aqui informamos onde está salvo os nossos arquivos de view
                //Nesse caso em app/View
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                //Aqui o Twig vai acessar o caminho que acabamos de informar para nossos arquivos de view
                $twig = new \Twig\Environment($loader);
                //Aqui informamos qual arquivos queremos que o Twig carregue da nossa pasta view
                $template = $twig->load('home.html');

                //Criamos um array vazio, esse array é onde vamos armazenar os parâmetros que iremos enviar
                //para a pagian que desejamos, nesse caso, home.html
                $parametros = array();
                //Aqui preenchemos o array com os nossos parâmetros. Nesse caso são todos os posts encontrados
                //no banco de dados, que recebemos ao chamarmos a função selecionaTodos() mais acima
                $parametros['postagens'] = $postagens;

                //Aqui 'renderizamos' nossa página, ou seja, carregamos ela e fazemos as alterações. Nesse caso
                //estamos trocando os titulos e os conteudos
                $conteudo = $template->render($parametros);
                echo $conteudo;


            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }