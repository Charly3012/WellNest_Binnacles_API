<?php
ob_start();
require_once __DIR__ . '/../includes/Binnacle.class.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idBinnacle']) ){
        Binnacle::getBinncleById($_GET['idBinnacle']);
    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Binnacle::getAllBinnacles();
    }else{
        header ('HTTP/1.1 404' );
    }


?>