<?php
abstract class Model {
    private static $db;

    private static function setDb(){
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=mangatheque','root');
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function getDb(){
        if(self::$db == null){
            self::setDb();
        }

        return self::$db;
    }

    public function deleteOneUserById(int $i) : bool
    {
        $req = $this->getDb()->prepare('DELETE FROM user WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);

        return $req->rowCount()  >  0;

    }
}