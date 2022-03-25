<?php
    class PostController{
        public function index($params){
            try {

                $postagem = Postagem::selectID($params);

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('post.html');

                $parameter = array();

                $parameter['assunto'] = $postagem->assunto;
                $parameter['descricao'] = $postagem->descricao;
                $parameter['data'] = $postagem->data;

                $parameter['url'] = '://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?';

                $content = $template->render($parameter);

                echo $content;

            }catch (Exception $e) {
                echo $e->getMessage();
            }

        }
    }