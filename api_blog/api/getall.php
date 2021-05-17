<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'get')
{
    $sql = $pdo->query("SELECT * FROM posts");
    if ($sql->rowCount() > 0)
    {
       $data = $sql->fetchAll(PDO::FETCH_ASSOC);

       foreach($data as $item) {
           $array['result'][] = [
               'id' => $item['id'],
               'title' => $item['title'],
               'content' => $item['content'],
               'created_at' => $item['created_at'],
               'updatetd_at' => $item['updated_at']
           ];
       }
    }
    else
    {
        $array['result'] = 'There is no registers here';
    }
}
else
{
    $array['error'] = 'Method not Allowed (Just GET)';
}

require('../return.php');