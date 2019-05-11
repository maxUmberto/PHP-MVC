<?php

    class Core{
        //Essa função recebe como parâmetro a URL
        public function start($urlGet){
            $acao = 'index';

            //Deve existir na url uma variável chamada página
            if(isset($urlGet['pagina'])){
                //Salva na variável o que ele recebeu como parâmetro na URL. Se ele recebeu pagina=home então ele vai
                //salvar HomeController na variável
                $controller = ucfirst($urlGet['pagina'].'Controller');
            }else{
                //Se não existir nenhuma variável na URL, por padrão então o controller chamado vai ser o HomeController
                $controller = 'HomeController';
            }

            //Conferimos se a classe que geramos logo acima existe. Se recebemos pagina=asjkd teriamos AsjkdController
            //salvo na variável, e essa classe não existe, logo ela cai no if e chamamos o ErroController e assim
            //mostramos uma mensagem de erro. Famoso erro 404
            if(!class_exists($controller)){
                $controller = 'ErroController';
            }

            //essa função funciona assim. Primeiro se passa um array, nesse array nós colocamos a classe que queremos
            //chamar e a funçaõ dentro dessa classe que desejamos chamar. O segundo array seria caso nos quisessemos
            //passar variáveis para essa função.
            //Por exemplo, aqui estamos intanciando a classe HomeController e chamando a função index dela, que faz
            //alguma coisa. Nesse caso por não estarmos salvando em uma variável ela não retorna nada
            call_user_func(array(new $controller, $acao), array());
        }
    }