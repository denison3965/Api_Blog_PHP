<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method == 'post')
{
    $title = filter_input(INPUT_POST, 'title');
    $content = filter_input(INPUT_POST, 'content');

    if ($title && $content)
    {
        
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