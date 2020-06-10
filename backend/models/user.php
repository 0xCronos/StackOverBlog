<?php
class User extends Database{

    //Comprueba si el usuario y contraseña pertenecen a un usuario existente.
    public function checkUser($email, $password){
        $md5Pass = md5($password);

        $query = "SELECT user_id, user_fullname, user_email, user_image, user_description, roles.role_name
                  FROM users
                  INNER JOIN roles ON users.role_id=roles.role_id
                  WHERE user_email = :email AND user_password = :password";
        $user = $this->connect()->prepare($query);
        $user->execute(['email' => $email,'password' => $md5Pass]);

        return ($user->rowCount() > 0) ? $user->fetch(PDO::FETCH_ASSOC) : null;
    }

    //Busca usuario por id, retorna null si no existe
    public function getUserById($id){
        $query = "SELECT user_id, user_fullname, user_email, user_image, user_description, roles.role_name
                  FROM users
                  INNER JOIN roles ON users.role_id=roles.role_id
                  WHERE user_id = :id";
        $user = $this->connect()->prepare($query);
        $user->execute(['id' => $id]);

        return ($user->rowCount() > 0) ? $user->fetch(PDO::FETCH_ASSOC) : null;
    }

    public function getUserPasswordById($id){
        $query = "SELECT user_password
                  FROM users
                  WHERE user_id = :id";
        $user = $this->connect()->prepare($query);
        $user->execute(['id' => $id]);

        return ($user->rowCount() > 0) ? $user->fetch(PDO::FETCH_ASSOC) : null;
    }

    //Crea un usuario sin privilegios
    public function addUser($user_fullname, $user_email, $user_password, $user_image, $user_description){
        $query = "INSERT INTO users(user_id, user_fullname, user_email, user_password, user_image, user_description, user_timestamp, role_id)
                  VALUES(NULL, :user_fullname, :user_email, :user_password, :user_image, :user_description, NULL, 2)";
        $user = $this->connect()->prepare($query);

        try{
            $user->execute([
            'user_fullname' => $user_fullname,
            'user_email' => $user_email,
            'user_password' => md5($user_password),
            'user_image' => $user_image,
            'user_description' => $user_description
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //Comprueba si el email esta en uso (usar en controlador para notificar al usuario que ya existe)
    public function checkEmail($email){
        $query = "SELECT * FROM users WHERE user_email = :user_email";
        $user = $this->connect()->prepare($query);
        $user->execute(['user_email' => $email]);
        return ($user->rowCount() > 0) ? true : false;
    }

    public function updateUser($user_id, $user_fullname, $user_password, $user_image=null, $user_description){
        if($user_image){
            $query = "UPDATE users 
                      SET user_fullname= :user_fullname, user_password = :user_password, user_image = :user_image, user_description = :user_description 
                      WHERE user_id = :user_id";
            $res = $this->connect()->prepare($query);
            $res->execute(['user_id' => $user_id, 'user_fullname' => $user_fullname, 'user_password' => $user_password, 'user_image' => $user_image, 'user_description' => $user_description]);
            return true;
        }else{
            $query = "UPDATE users 
                      SET user_fullname= :user_fullname, user_password = :user_password, user_description = :user_description 
                      WHERE user_id = :user_id";
            $res = $this->connect()->prepare($query);
            $res->execute(['user_id' => $user_id, 'user_fullname' => $user_fullname, 'user_password' => $user_password, 'user_description' => $user_description]);
            return true;
        }
    }

    //muestra datos basicos del dueño del blog
    public function getOwner(){
        $query = "SELECT user_id, user_fullname, user_email, user_image, user_description, roles.role_name
                  FROM users
                  INNER JOIN roles ON users.role_id=roles.role_id
                  WHERE role_name = 'admin'";
        $user = $this->connect()->query($query);

        return ($user->rowCount() > 0) ? $user->fetch(PDO::FETCH_ASSOC) : null;
    }

    public function getImagePathOfUser($id){
        $query = "SELECT user_image FROM users WHERE user_id = :id";
        $res = $this->connect()->prepare($query);
        $res->execute(['id' => $id]);
        return ($res->rowCount() != 0) ? $res->fetch(PDO::FETCH_ASSOC)['user_image'] : null; 
    }
}
?>
