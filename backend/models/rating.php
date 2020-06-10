<?php
class Rating extends Database{

    //Busca rating por id, retorna null si no existe
    public function getRatingById($new_id){
        $query = "SELECT round( avg(rating_value), 1) AS rating_average
                  FROM ratings
                  WHERE new_id = :new_id";
        $res = $this->connect()->prepare($query);
        $res->execute(['new_id' => $new_id]);

        return ($res->rowCount() > 0) ? $res->fetch(PDO::FETCH_ASSOC) : null;
    }

    public function addRatingValue($rating_value, $new_id, $ip_address){
        $query = "INSERT INTO `ratings`(`rating_value`, `new_id`, `ip_address`) VALUES (:rating_value, :new_id, :ip_address)";
        $res = $this->connect()->prepare($query);

        try{
            $res->execute([
                'rating_value' => $rating_value,
                'new_id' => $new_id,
                'ip_address' => $ip_address,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function UserVoted($new_id, $ip_address){
        $query = "SELECT * from ratings WHERE new_id = :new_id AND ip_address = :ip_address";
        $res = $this->connect()->prepare($query);


        $res->execute([
            'new_id' => $new_id,
            'ip_address' => $ip_address,
        ]);

        return ($res->rowCount() != 0) ? true : false;
    }

    //Busca rating por id, retorna null si no existe
    public function deleteRatingById($new_id){
        $query = "DELETE FROM ratings WHERE new_id = :new_id";
        $res = $this->connect()->prepare($query);
        try{
            $res->execute(["new_id" => $new_id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>
