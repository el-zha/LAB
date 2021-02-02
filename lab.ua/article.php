
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
    <?php
    $articles = mysqli_query($connection, "SELECT * FROM `pages` WHERE `id` = " . $_GET['id']);
    $art = mysqli_fetch_assoc($articles); ?>
    </div>
    <h1><?php echo $art['caption']; ?></h1>
    </div>
    <div class="content">
        <?php echo $art['content']; ?>

    </div>

</main>


</body>
</html>
