<?php
    class Core{

        public function  start($urlGet){

            $action = 'index';

            if(isset($urlGet['metodo'])){
                $action = $urlGet['metodo'];
            }
            if(isset($urlGet['login'])){
                $action = $urlGet['login'];
            }
            $id = null;

            if(isset($urlGet['pagina'])){
                $controller = ucfirst($urlGet['pagina'].'Controller');
            }else{
                $controller = 'LoginController';
            }

            if(!class_exists($controller)){
                $controller = "ErroController";
            }
            if(isset($urlGet['id']) && $urlGet['id'] != null){
                $id =  $urlGet['id'];
            }

            call_user_func_array(array(new $controller, $action), array($id));

        }
    }
