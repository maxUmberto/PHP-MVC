<?php

    class Postagem{
        //Ao colocar static pode-se acessar a função sem precisar instanciar a classe
        public static function selecionaTodos(){
            $conexao = Connection::getConexao();

            $sql = 'SELECT * FROM postagem ORDER BY id_postagem DESC';
            $sql = $conexao->prepare($sql);
            $sql->execute();

            $resultado = array();

            //Vai pegar os registros encontrados no banco e convertê-los em objetos da classe Postagem
            while($row = $sql->fetchObject('Postagem')){
                $resultado[] = $row;
            }

            if(!$resultado){
                throw new Exception('Não foi encontrado nenhum registro no banco');
            }
            return $resultado;
        }

    }