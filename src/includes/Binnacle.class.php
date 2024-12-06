<?php
ob_start();
    require_once __DIR__ . '/Database.class.php';

    class Binnacle{
        public static function insertBinnacle($idUser, $content){

            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('INSERT INTO binnacles (idUser, content) VALUES
            (:idUser, :content)');

            $stmt -> bindParam(':idUser', $idUser);
            $stmt -> bindParam(':content', $content);

            if($stmt->execute()){
                header ('HTTP/1.1 201 Binnacle created');
            }else{
                header ('HTTP/1.1 404 Error creating binnacle');
            }
        }

        public static function deleteBinnacle($idBinnacle){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('DELETE FROM binnacles where idBinnacle = :idBinnacle');
            $stmt -> bindParam(':idBinnacle', $idBinnacle);

            if($stmt->execute()){
                header ('HTTP/1.1 204 Binnacle deleted successfully');
            }else{
                header ('HTTP/1.1 404 Error deleting binnacle' );
            }
        }

        public static function getAllBinnacles(){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('SELECT * FROM binnacles');

            if($stmt->execute()){
                $result = $stmt -> fetchAll();
                header ('HTTP/1.1 200');
                echo json_encode($result);
            }else{
                header ('HTTP/1.1 404' );
            }
        }

        public static function getBinncleById($idBinnacle){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('SELECT * FROM binnacles WHERE idBinnacle = :idBinnacle');
            $stmt -> bindParam(':idBinnacle', $idBinnacle);


            if($stmt->execute()){
                $result = $stmt -> fetchAll();
                header ('HTTP/1.1 200');
                echo json_encode($result);
            }else{
                header ('HTTP/1.1 404' );
            }
        }

        public static function modifyBinncle($idBinnacle, $content){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('UPDATE binnacles SET content = :content WHERE idBinnacle = :idBinnacle');
            $stmt -> bindParam(':idBinnacle', $idBinnacle);
            $stmt -> bindParam(':content', $content);

            if($stmt->execute()){
                header ('HTTP/1.1 200');
            }else{
                header ('HTTP/1.1 404' );
            }

        }
    }
?>