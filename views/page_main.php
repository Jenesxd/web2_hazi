<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Web Házi Feladat</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?php
    if ($viewData['style']) { ?>

        <link rel="stylesheet" type="text/css" href="<?= $viewData['style'] ?>">

    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">

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
