<?php
ob_start();
require_once __DIR__ . '/../includes/Binnacle.class.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'
        && isset($_GET['idUser']) && isset($_GET['content'])){
        Binnacle::insertBinnacle($_GET['idUser'],$_GET['content']);
    }else{
        header ('HTTP/1.1 404' );
    }

?>