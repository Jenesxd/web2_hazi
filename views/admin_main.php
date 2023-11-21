<div class="page_content">
    <h2 class="page_title">Admin</h2>
    <?php
    if (!empty($viewData["message"])) { ?>
        <div>
            <?= $viewData['message'] ?>
        </div>
    <?php }

    switch ($viewData["result"]) {
        case 'OK':
            echo "<h3>Admin üzenetek:</h3>";
            echo "<ul>";

            foreach ($viewData["rows"] as $row) {
                echo "<li>";
                echo "<a href=\"mailto:" . $row["inquery_email"] . "\">" . $row["inquery_email"] . "</a><br>";
                echo "<a href=\"tel:" . $row["inquery_phone"] . "\">" . $row["inquery_phone"] . "</a><br><br>";
                echo "<span>" . $row["inquery_message"] . "</span>";
                echo "</li>";
                echo "<br>";
            }

            echo "</ul>";
            break;
        case 'ERROR':
            echo $viewData['message'];
            break;
    }

    ?>
</div>
