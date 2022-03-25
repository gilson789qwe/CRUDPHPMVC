<?php
    class LoginController{
        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('login.html');

            $parameter = array();

            $content = $template->render($parameter);

            echo $content;
        }
        public function checking(){
            Postagem::checking($_POST);
        }
    }