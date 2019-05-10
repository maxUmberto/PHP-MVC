<?php

    class Core{
        //Função que pega a URL
        public function start($urlGet){
            $acao = 'index';
            
            if(isset($urlGet['pagina'])){
                $controller = ucfirst($urlGet['pagina'].'Controller');
            }else{
                $controller = 'HomeController';
            }


            if(!class_exists($controller)){
                $controller = 'ErroController';
            }

            //Passa um array onde primeiro se informa o nome da classe
            //No segundo parâmetro se informa o nome do metodo
            //O outro array recebe os parâmetros (id, por exemplo);
            call_user_func(array(new $controller, $acao), array());
        }
    }