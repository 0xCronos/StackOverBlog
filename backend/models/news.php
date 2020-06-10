<?php

require_once "comments.php";
require_once "rating.php";
class News extends Database{

    /* Descripción:
     * devuelve  las n ultimas noticias del tipo especificado
     * y ordenadas por fecha de creacion
     *
     * @param string $stateType => Tipo de noticia (public, private, not_public)
     * @param string $sortType => Tipo de ordenamiento (ASC, DESC, null para no ordenar)
     * @param int $amount => Cantidad de noticias a mostrar (null para mostrar todas)
     * @return array[] $news => Noticias encontradas
    */
    public function getNews($stateType, $sortType, $amount){

        //comprueba valor correcto en variable $stateType
        if($stateType != "public" && $stateType != "private" && $stateType != "not_public" && $stateType != null){
            echo "Error en la consulta: valor incorrecto en parametro stateType => "; echo var_dump($stateType);
            return null;
        }

        //comprueba valor correcto en variable $amount
        if(!is_numeric($amount) && $amount != null){
            echo "Error en la consulta: valor incorrecto en parametro amount => "; echo var_dump($amount);
            return null;
        }

        //consulta por defecto
        $query = "SELECT new_id, new_title, new_image, new_body, new_timestamp, categories.category_name, users.user_fullname, users.user_image
                  FROM news
                  INNER JOIN news_states ON news.state_id=news_states.state_id
                  INNER JOIN categories ON news.category_id=categories.category_id
                  INNER JOIN users ON news.author_id=users.user_id";

        //Añade filtro por estado de noticia
        if($stateType){
            $query = $query." WHERE state_type = '$stateType'";
        }

        //Añade ordenamiento ascendente o descendente
        if($sortType == "asc"){ //ascendente
            $query = $query." ORDER BY new_timestamp ASC";
        }else if($sortType == "desc"){ //descendente
            $query = $query." ORDER BY new_timestamp DESC";
        }else if($sortType != null){
            echo "Error en la consulta: valor incorrecto en parametro sortType => "; echo var_dump($sortType);
            return null;
        }

        //Comprueba y asigna cantidad de noticias a mostrar
        if($amount && $amount >= 0){
            $query = $query." LIMIT $amount";
        }else if($amount < 0){
            echo "Error en la consulta: cantidad invalida en parametro amount => "; echo var_dump($amount);
            return null;
        }

        //Ejecuta consulta
        $res = $this->connect()->query($query);

        //Retorna null si no existen datos
        if($res->rowCount() == 0) return null;

        $data = [];
        $rating = new Rating();
        $comments = new Comments();
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $new) {

            //Añade comentarios a las noticias
            $commentsOfNew = $comments->getCommentsFromNew($new['new_id']);
            if($commentsOfNew){
                $new += array('comments' => $commentsOfNew);
            }else{
                $new += array('comments' => []);
            }

            //Añade calificacion a las noticias
            $ratingOfNew = $rating->getRatingById($new['new_id']);
            if($ratingOfNew){
                $new += array('rating' => doubleval($ratingOfNew['rating_average']));
            }else{
                $new += array('rating' => []);
            }

            $data[] = $new;
        }

        return $data;
    }

    //Busca noticia por id, retorna null si no existe
    public function getNew($id){
        $query = "SELECT new_id, new_title, new_image, new_body, new_timestamp, categories.category_name, users.user_fullname, users.user_image
                  FROM news
                  INNER JOIN news_states ON news.state_id=news_states.state_id
                  INNER JOIN categories ON news.category_id=categories.category_id
                  INNER JOIN users ON news.author_id=users.user_id
                  WHERE new_id = :id";
        $res = $this->connect()->prepare($query);
        $res->execute(['id' => $id]);

        //Retorna null si no existe noticia
        if($res->rowCount() == 0) return null;

        $rating = new Rating();
        $comments = new Comments();
        $new = $res->fetch(PDO::FETCH_ASSOC);

        //Añade comentarios a la noticia
        $commentsFromNew = $comments->getCommentsFromNew($new['new_id']);
        if($commentsFromNew){
            $new += array('comments' => $commentsFromNew);
        }else{
            $new += array('comments' => []);
        }

        //Añade calificacion a las noticias
        $ratingOfNew = $rating->getRatingById($new['new_id']);
        if($ratingOfNew){
            $new += array('rating' => doubleval($ratingOfNew['rating_average']));
        }else{
            $new += array('rating' => []);
        }

        $data[] = $new;
        return $data;
    }

    //Borra noticia con el id ingresado
    public function deleteNew($id){
        //comprueba que exista una noticia con el id ingresado
        if(!$this->getNew($id)) return false;

        $query = "DELETE FROM news WHERE new_id = :id";
        $res = $this->connect()->prepare($query);

        try{
            $res->execute(["id" => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //Crea noticia, se debe especificar su id de categoria y id de autor(debe ser administrador)
    public function addNew($title, $body, $image, $state_id, $category_id, $author_id){
        $query = "INSERT INTO news(new_id, new_timestamp, new_title, new_body, new_image, state_id, category_id, author_id)
                  VALUES (NULL, NULL, :title, :body, :image, :state_id, :category_id, :author_id)";
        $res = $this->connect()->prepare($query);

        try{
            $res->execute([
                'title' => $title,
                'body' => $body,
                'image' => $image,
                'state_id' => $state_id,
                'category_id' => $category_id,
                'author_id' => $author_id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //Actualiza noticia con el id ingresado
    public function modifyNew($new_id, $title, $body, $image=null, $state_id, $category_id){
        //comprueba que exista una noticia con el id ingresado
        if(!$this->getNew($new_id)) return false;

        //Se desea cambiar imagen
        if($image){
            $query = "UPDATE news
                      SET new_title = :title, new_body = :body, new_image = :image, state_id = :state_id, category_id = :category_id
                      WHERE new_id = :new_id";
            $res = $this->connect()->prepare($query);

            $res->execute([
                'title' => $title,
                'body' => $body,
                'image' => $image,
                'state_id' => $state_id,
                'category_id' => $category_id,
                'new_id' => $new_id
            ]);

            return true;
        }else{ //se deja la misma imagen
            $query = "UPDATE news
                      SET new_title = :title, new_body = :body, state_id = :state_id, category_id = :category_id
                      WHERE new_id = :new_id";
            $res = $this->connect()->prepare($query);

            $res->execute([
                'title' => $title,
                'body' => $body,
                'state_id' => $state_id,
                'category_id' => $category_id,
                'new_id' => $new_id
            ]);

            return true;
        }
    }

    public function get5BestRatedNews(){
        $query = "SELECT * FROM news inner join ratings on ratings.new_id = news.new_id order by ratings.rating_value desc limit 5";
        $res =  $this->connect()->query($query);
        return ($res->rowCount() > 0) ? $res->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public function getImagePathOfNew($id){
        $query = "SELECT new_image FROM news WHERE new_id = :id";
        $res = $this->connect()->prepare($query);
        $res->execute(['id' => $id]);
        return ($res->rowCount() != 0) ? $res->fetch(PDO::FETCH_ASSOC)['new_image'] : null; 
    }
}
?>
