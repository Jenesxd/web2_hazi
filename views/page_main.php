<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Web Házi Feladat</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">
    <?php
    if ($viewData['style']) { ?>

        <link rel="stylesheet" type="text/css" href="<?= $viewData['style'] ?>">

    <?php } ?>
</head>

<body>
    <header>
        <div class="headerTitlebar">
            <h1 class="header">Web2 Beadandó</h1>
            <?php if (!empty($_SESSION["userid"])) { ?>
                <div id="user"><em>
                        Belépve:
                        <?= $_SESSION["userfirstname"] . " " . $_SESSION["userlastname"] . " (" . $_SESSION["username"] . ")" ?>
                    </em></div>
            <?php } ?>
        </div>

        <nav class="navbar">
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
    </header>

    <section>
        <?php if ($viewData['render'])
            include($viewData['render']); ?>
    </section>
    <footer>
        &copy;Jenes Norbert, Bercze Zsombor - <?= date("Y") ?>
    </footer>
</body>

</html>
