<?php
require "includes/config.php";
print_r($_POST);
//$result= $mysqli->query("INSERT INTO" .pages. "(caption, content) VALUES ($caption, $content)");
if (isset($_POST ['save']))
{
    $errors = array();
    if ($_POST ['caption'] == '' )
    {
        $errors[]='Введите название!';
    }
    if ($_POST ['content'] == '' )
    {
        $errors[]='Введите рецепт!';
    }
    else{
        echo $errors['0'];
    }
}