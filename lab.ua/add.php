<?php
require "includes/config.php";
?>

<!DOCTIPE html>
<html>
<head>
    <title> coffee </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div >
    </div>
</header>

<main>

    <?php
    $captions = mysqli_query($connection, "SELECT * FROM `pages`");
    ?>
    <div class="menu">
        <ul >
            <li><a href="/">Главная</a></li>
            <?php
            while( $cap = mysqli_fetch_assoc($captions))
            {
                ?>
                <li><a href="article.php?id=<?php echo $cap['id'];  ?>"><?php
                        echo $cap['caption']; ?></a></li>

                <?php
            }
            ?>
            <li><a href="/add.php">Добавить рецепт</a></li>
        </ul>
    </div>

    </div>
    <div class="content">
        </br>
    <form method="POST" action="/add.php">
       <?php
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

        if(empty($errors))
        {
            //echo "INSERT INTO `pages` (`caption`, `content`) VALUES ('".$_POST['caption']."', '".$_POST['content']."')";
           // exit();
            mysqli_query($connection, "INSERT INTO `pages` (`caption`, `content`) VALUES ('".$_POST['caption']."', '".$_POST['content']."')");


            
         echo 'Рецепт успешно добавлен!'  ;
        }

        else{
        echo $errors['0'] . '<hr>';
        }

        }

        ?>

        <input type="text" placeholder="Введите название" name="caption" value="<?php echo $_POST['caption']; ?>"> </br> </br> </br>
        <textarea  placeholder="Введите рецепт" name="content" cols="100" rows="10" wrap="hard" > <?php echo $_POST['content']; ?> </textarea>
        <input type="submit" value="Сохранить" name="save">
    </form>
    </div>

</main>


</body>
</html>
