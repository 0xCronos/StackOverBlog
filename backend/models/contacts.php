<?php
class Contacts extends Database{

    public function getContacts(){
        $query = "SELECT * FROM contacts";
        $res = $this->connect()->query($query);
        return ($res->rowCount() > 0) ? $res->fetchAll(PDO::FETCH_ASSOC) : null;
    }

    public function addContact($contact_fullname, $contact_email, $contact_text){
        $query = "INSERT INTO contacts(contact_fullname, contact_email, contact_text) 
                  VALUES (:contact_fullname, :contact_email, :contact_text)";
        $res = $this->connect()->prepare($query);
        
        try{
            $res->execute([
                'contact_fullname' => $contact_fullname,
                'contact_email' => $contact_email,
                'contact_text' => $contact_text,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteContact($id){
        $query = "DELETE FROM contacts WHERE contact_id = :id";
        $res = $this->connect()->prepare($query);

        try{
            $res->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>
