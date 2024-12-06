<?php
ob_start();
require_once __DIR__ . '/../includes/Binnacle.class.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['idBinnacle']) && isset($_GET['content'])){
        Binnacle::modifyBinncle($_GET['idBinnacle'],$_GET['content']);
    }else{
        header ('HTTP/1.1 404' );
    }


?>