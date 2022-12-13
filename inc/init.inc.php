<?php

// Connexion BDD
$host = 'mysql:host=localhost;dbname=blog'; 
$login = 'root'; 
$password = ''; 
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
);

$pdo = new PDO($host, $login, $password, $options);

// Variable permettant d'afficher des messages utilisateur (vide par défaut)
$msg = '';

// On crée ou on ouvre la session
session_start();