<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method == 'put')
{
    //Lendo um arquivo no php onde ele armazena os meus parâmentros
    //já que no PHP só temos o INPUT_GET e o INPUT_POST
    parse_str(file_get_contents('php://input'), $input);

    $id = (!empty($input['id'])) ? $input['id'] : null;
    $title = (!empty($input['title'])) ? $input['title'] : null;
    $content = (!empty($input['content'])) ? $input['content'] : null;


    //Filtrando as variaveis já que elas nã]o passaream por nenhum INPUT_GET ou INPUT_POST

    $id = filter_var($id);
    $title = filter_var($title);
    $content = filter_var($content);

    if ($id && $title && $content)
    {
        $sql = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();



        if ($sql->rowCount() > 0)
        {
            $today = date('y-m-d');


            $sql = $pdo->prepare("UPDATE posts SET title = :title, content = :content, updated_at = :today WHERE id = :id");
            $sql->bindValue(':title', $title);
            $sql->bindValue(':content', $content);
            $sql->bindValue(':today', $today);
            $sql->bindValue(':id', $id);
            $sql->execute();

            $array['result'] = "The POST id : $id is updated";
        }
        else
        {
            $array['error'] = 'Post not exist';
        }
    }
    else 
    {
        $array['error'] = 'unsent data';
    }


}
else
{
    $array['error'] = 'Method not Allowed (Just PUT)';
}

require('../return.php');