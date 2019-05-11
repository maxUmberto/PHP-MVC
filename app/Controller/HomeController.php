<?php

    class HomeController{
        public function index(){
            try{
                //echo 'teste';
                $postagens = Postagem::selecionaTodos();

                echo '<pre>';
                var_dump($postagens);
                echo '</pre>';
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }