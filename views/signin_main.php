<div class="page_content">
    <h2 class="page_title">Bejelentkezés</h2>

    <?php
    if (!empty($viewData["message"])) { ?>
        <div>
            <?= $viewData['message'] ?>
        </div>
    <?php } ?>

    <form action="<?= SITE_ROOT . "signin" ?>" method="POST">
        <input type="text" name="signin_username" id="singin_username" placeholder="Felhasználónév" required><br><br>

        <input type="password" name="signin_password" id="singin_password" placeholder="Jelszó" required><br><br>

        <button type="submit">Belépés</button>

    </form>
</div>