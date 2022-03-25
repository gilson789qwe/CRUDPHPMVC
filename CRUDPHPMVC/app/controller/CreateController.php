<?php
    class CreateController{
        public function index($params){

        }
        public function create(){
            try {

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('create.html');

                $parameter = array();


                $parameter['url'] = '://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?';

                $content = $template->render($parameter);

                echo $content;

            }catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        public function edit($params){
            $postagem = Postagem::selectID($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('edit.html');

            $parameter = array();

            $parameter['id'] = $postagem->id;
            $parameter['assunto'] = $postagem->assunto;
            $parameter['descricao'] = $postagem->descricao;
            $parameter['data'] = $postagem->data;

            $parameter['url'] = '://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?';

            $content = $template->render($parameter);

            echo $content;
        }
        public function insert(){
            Postagem::insert($_POST);
        }
        public function update(){
            $id = $_GET['id'];
            Postagem::update($_POST, $id);
        }
        public function delete(){
            $id = $_GET['id'];
            Postagem::delete($id);
        }
    }