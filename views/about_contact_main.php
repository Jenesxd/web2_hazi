<div class="page_content">
    <h2 class="page_title">Kapcsolat</h2>

    <?php
    if (!empty($viewData["message"])) { ?>
        <div>
            <?= $viewData['message'] ?>
        </div>
    <?php } ?>

    <form action="<?= SITE_ROOT ?>about&contact" method="POST" name="contact">
        <input type="email" name="contact_email" id="contact_email" placeholder="Email" required maxlength="64"><br><br>
        <input type="number" name="contact_phone" id="contact_phone" placeholder="Telefonszám" maxlength="15"
            min="0"><br><br>
        <textarea name="contact_message" id="contact_message" cols="30" rows="10" placeholder="Üzenet"
            maxlength="480"></textarea><br><br>
        <button type="submit">Küldés</button>

    </form>
</div>