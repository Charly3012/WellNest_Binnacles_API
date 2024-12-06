<?php
ob_start();
require_once __DIR__ . '/../includes/Binnacle.class.php';

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'
        && isset($_GET['idBinnacle'])){
        Binnacle::deleteBinnacle($_GET['idBinnacle']);
    }else{
            header ('HTTP/1.1 404' );
        }

?>