<?php
    class SobreController{
        public function index(){
            try {
                $colecPostagem = Postagem::selectAll();

                $postagem = Postagem::selectID(2);

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('sobre.html');

                $parameter = array();
                $parameter['postagens'] = $colecPostagem;

                $parameter['url'] = '://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?';

                $content = $template->render($parameter);

                echo $content;

            }catch (Exception $e) {
                echo $e->getMessage();
            }

        }
    }