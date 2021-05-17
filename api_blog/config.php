<?php

//Setando as variáveis para acessar o banco de dados
$db_host = 'localhost';
$db_name = 'blog_api_PHP';
$db_user = 'root';
$db_pass = '';


//Instânseando um objeto PDO para conseguir fazer manipulação no banco de dados
$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

//Setando minha a estrutura da minha response
$array = [
    'error' => '',
    'result' => []
];