<?php
    
    $server = '127.0.0.1:3307';
    $username = 'root';
    $password = '';
    $database = 'usuarioshospital';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database",$username, $password);
    
    } catch (PDOException $e){
        die('Conexión fallida: '.$e->getMessage());
    }

?>