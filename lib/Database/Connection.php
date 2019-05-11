<?php

    abstract class Connection{

        private static $conn;

        public static function getConexao(){
            if(self::$conn == null){
                /*try {
                    //Utiliza-se self por ser um atributo estático. Se não fosse isso se usaria a tag $this->
                    self::$conn = new PDO('mysql:host=localhost; dbname=serie-criando-site', 'root', '');
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }*/
                //Utiliza-se self por ser um atributo estático. Se não fosse isso se usaria a tag $this->
                self::$conn = new PDO('mysql:host=localhost; dbname=serie-criando-site', 'root', '');
            }

            return self::$conn;
        }
    }
