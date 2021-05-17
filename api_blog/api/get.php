<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method == 'get')
{
    $id = filter_input(INPUT_GET, 'id');

    if ($id)
    {
        $sql = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        

        if ($sql->rowCount() > 0)
        {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'][] = [
                'id' => $dados['id'],
                'title' => $dados['title'],
                'content' => $dados['content'],
                'created_at' => $dados['created_at'],
                'updatetd_at' => $dados['updated_at']
            ];

        }
        else
        {
            $array['error'] = "User not found";
        }

    }
    else 
    {
        $array['error'] = 'id is required';
    }

}
else
{
    $array['error'] = 'Method not Allowed (Just GET)';
}

require('../return.php');