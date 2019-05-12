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

        public static function selecionaPorId($id_postagem){
            $conexao = Connection::getConexao();

            $sql = "SELECT * FROM postagem WHERE id_postagem = :id";
            $sql = $conexao->prepare($sql);
            $sql->bindValue(":id", $id_postagem, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetchObject('Postagem');

            if(!$resultado){
                throw new Exception('Não foi encontrado nenhum registro no banco');
            }
            return $resultado;
        }

    }