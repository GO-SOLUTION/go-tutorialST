<?php

$dbstring = "
CREATE DATABASE IF NOT EXISTS goTutorial CHARACTER SET utf8 COLLATE utf8_general_ci;
USE goTutorial;
CREATE TABLE IF NOT EXISTS tutorial_eintraege(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    tutorial_beschreib varchar(255),
    tutorial_what varchar(255),
    tutorial_url varchar(255)
    );";

    $dbpass = "root";
    $dbuser = "root";
    $dbhost = "127.0.0.1";




    $db = new PDO ("mysql:host=$dbhost" , "$dbuser" , "$dbpass");



    $erstellen = $db->prepare($dbstring);
    $erstellen->execute();



    header("Location: go-tutorial/index.php");

?>