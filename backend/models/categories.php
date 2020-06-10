<?php
class Categories extends Database{

    //Busca todas las categorias, retorna null si no hay
    public function getCategories(){
        $query = "SELECT * FROM categories";
        $res =  $this->connect()->query($query);

        return ($res->rowCount() > 0) ? $res->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    //Busca categoria por id, retorna null si no existe
    public function getCategoryById($id){
        $query = "SELECT * FROM categories WHERE category_id = :id";
        $res = $this->connect()->prepare($query);
        $res->execute(['id' => $id]);

        return ($res->rowCount() > 0) ? $res->fetch(PDO::FETCH_ASSOC) : null;
    }

    //Crea categoria
    public function addCategory($category_name){
        //Comprueba si ya existe una categoria con ese nombre
        if($this->checkCategoryName($category_name)) return false;

        $query = "INSERT INTO categories(category_id, category_name) VALUES(NULL, :category_name)";
        $res = $this->connect()->prepare($query);
        
        try{
            $res->execute(['category_name' => ucfirst(strtolower($category_name))]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //Borra categoria
    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE category_id = :id";
        $res = $this->connect()->prepare($query);

        try{
            $res->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //Actualiza nombre de la categoria con el id ingresado
    public function updateCategory($category_name, $id){
        $query = "UPDATE categories SET category_name = :category_name WHERE category_id = :id";
        $res = $this->connect()->prepare($query);
        return $res->execute(['category_name' => ucfirst(strtolower($category_name)), 'id' => $id]);
    }

    //Comprueba si la categoria existe
    public function checkCategoryName($category_name){
        $query = "SELECT * FROM categories WHERE category_name = :category_name";
        $res = $this->connect()->prepare($query);
        $res->execute(['category_name' => $category_name]);
        return ($res->rowCount() > 0) ? true : false;
    }
}
?>
