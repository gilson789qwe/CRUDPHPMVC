<?php
    abstract class Connection{
        private static $connection;

        public static function getConnection(){
            if(self::$connection == null){
                self::$connection = new PDO(
                    'mysql: host=localhost; dbname=empresa;',
                    'root',
                    ''
                );
            }
            return self::$connection;
        }
    }