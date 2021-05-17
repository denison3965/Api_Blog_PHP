<?php

//Configurando o header da minha API REST pata permitir acesso as MÉTODOS, e permitido que qualquer putro site possa fazer requisição http para essa API
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Content-Type: application/json");

//Voltando a minha RESPONSE
echo json_encode($array);
exit;