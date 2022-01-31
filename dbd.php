<?php 

    try {
        $dbd = new PDO('mysql:host=127.0.0.1:3307;dbname=usuarioshospital;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die ('Error: '.$e->getMessage());
    }

?>