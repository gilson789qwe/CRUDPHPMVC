<?php
    class Postagem{
        public static function selectAll(){
            $connection = Connection::getConnection();

            $sql = $connection->prepare("SELECT * FROM postagem ORDER BY id DESC");
            $sql->execute();

            $result = array();

            while($row = $sql->fetchObject('Postagem')){
                    $result[] = $row;
            }
            if(!$result){
                throw new Exception("Não foi encontrado nenhum registro");
            }
            //var_dump($sql->fetchAll());
            return $result;
        }
        public static function selectID($idPost){
            $connection = Connection::getConnection();

            $sql = $connection->prepare("SELECT * FROM postagem WHERE  id = :id");
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();

            $result =$sql->fetchObject('Postagem');

            return $result;
        }
        public static function insert($valuePost){
            $connection = Connection::getConnection();

            $sql = $connection->prepare('INSERT INTO postagem(assunto, descricao, data) VALUES (:assunto, :descricao, :data)');

            $sql->bindValue(':assunto', $valuePost['assunto']);
            $sql->bindValue(':descricao', $valuePost['descricao']);
            $sql->bindValue(':data', $valuePost['data']);

            $sql->execute();

            echo "Criado com sucesso";
        }
        public static function update($valuePost, $id){
            $connection = Connection::getConnection();

            $sql = $connection->prepare('UPDATE postagem SET 
                    assunto   = :assunto, 
                    descricao = :descricao,
                    data     = :data
                    WHERE id = :id
                    ');

            $sql->bindValue(':assunto', $valuePost['assunto']);
            $sql->bindValue(':descricao', $valuePost['descricao']);
            $sql->bindValue(':data', $valuePost['data']);
            $sql->bindValue(':id', $id);

            $sql->execute();

            echo "Atualizado com sucesso";

        }
        public static function delete($id){
            $connection = Connection::getConnection();

            $sql = $connection->prepare('DELETE FROM cliente WHERE id = :id');
            $sql->bindValue(':id', $id);

            $sql->execute();

            echo "Deletado com sucesso";

        }
        public  static  function checking($check){
            $connection = Connection::getConnection();
            $sql = $connection->prepare("SELECT * FROM cliente WHERE user = :user AND password = :password");
            $sql->bindValue(':user', $check['user']);
            $sql->bindValue(':password', $check['password']);
            $sql->execute();
            $check = $sql->fetchColumn();
            if($check){
                echo '<a href="index.php?pagina=home">Seja Bem Vindo!</a>';
            }else{
                echo "Login Errado";
            }

        }
    }