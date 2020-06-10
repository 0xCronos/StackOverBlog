<?php
class Comments extends Database{

    //Busca los comentarios de una noticia con el id ingresado
    public function getCommentsFromNew($id){
        $query = "SELECT comment_id, comment_timestamp, comment_text, users.user_id, users.user_fullname, users.user_image, new_id
                  FROM comments
                  INNER JOIN users ON comments.user_id=users.user_id
                  WHERE new_id = :id
                  ORDER BY comment_timestamp ASC";
        $comments =  $this->connect()->prepare($query);

        $comments->execute(["id" => $id]);
        
        return ($comments->rowCount() > 0) ? $comments->fetchAll(PDO::FETCH_ASSOC) : null;
    }
    
    //Añade comentario a la noticia con el id ingresado
    public function addComment($user_id, $new_id, $comment_text){
        $query = "INSERT INTO comments(comment_id, comment_timestamp, comment_text, user_id, new_id) 
                  VALUE(NULL, NULL, :comment_text, :user_id, :new_id)";
        $res = $this->connect()->prepare($query);
        
        try{
            $res->execute([
                'comment_text' => $comment_text, 
                'user_id' => $user_id, 
                'new_id' => $new_id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    
    //Borra comentario con el id ingresado
    public function deleteComment($id){
        //comprueba que el comentario con el id ingresado exista
        if(!$this->checkComment($id)) return false;
        
        $query = "DELETE FROM comments WHERE comment_id = :id";
        $res = $this->connect()->prepare($query);
        
        try{
            $res->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //comprueba si el comentario con el id existe
    private function checkComment($id){
        $query = "SELECT * FROM comments WHERE comment_id = :id";
        $res = $this->connect()->prepare($query);
        $res->execute(['id' => $id]);
        return ($res->rowCount() == 1) ? true : false;
    }
}
?>