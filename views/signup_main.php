<div class="page_content">
    <h2 class="page_title">Regisztáció</h2>

    <?php
    if (!empty($viewData["message"])) { ?>
        <div>
            <?= $viewData['message'] ?>
        </div>
    <?php } ?>

    <form action="<?= SITE_ROOT . "signup" ?>" method="POST">
        <input type="text" name="signup_username" id="signup_username" placeholder="Felhasználónév" required><br><br>

        <input type="password" name="signup_password" id="signup_password" placeholder="Jelszó" required><br><br>

        <input type="password" name="signup_password_confirm" id="signup_password_confirm" placeholder="Jelszó mégegyszer" required><br><br>
        
        <input type="text" name="signup_lastname" id="signup_lastname" placeholder="Vezetéknév" required><br><br>
        
        <input type="text" name="signup_firstname" id="signup_firstname" placeholder="Keresztnév" required><br><br>

        <button type="submit">Regisztáció</button>
    </form>
</div>