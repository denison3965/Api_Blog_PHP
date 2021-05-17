<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method == 'post')
{
    $title = filter_input(INPUT_POST, 'title');
    $content = filter_input(INPUT_POST, 'content');
    $today = date('y-m-d');

    if ($title && $content)
    {

        $sql = $pdo->prepare("INSERT INTO posts (title, content, created_at, updated_at) VALUES (:title, :content, :today, :today)");
        $sql->bindValue(':title', $title);
        $sql->bindValue(':content', $content);
        $sql->bindValue(':today', $today);
        $sql->execute();

        $array['result'] = 'Post created successfully';
    }
    else
    {
        $array['error'] = 'Title and Content is required';
    }
}
else
{
    $array['error'] = 'Method not Allowed (Just POST)';
}

require('../return.php');