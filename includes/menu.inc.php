<?php

class Menu
{
    public static $menu = array();

    public static function setMenu()
    {
        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query("select menu_url, menu_title, menu_parent, menu_permission from menu where menu_permission like '" . $_SESSION['userlevel'] . "'order by menu_order");
        while ($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['menu_url']] = array($menuitem['menu_title'], $menuitem['menu_parent'], $menuitem['menu_permission']);
        }
    }

    public static function getMenu($sItems)
    {
        $submenu = "";

        $menu = "<ul class=\"menu\">";
        foreach (self::$menu as $menuindex => $menuitem) {
            if ($menuitem[1] == "") {
                $menu .= "<li><a href='" . SITE_ROOT . $menuindex . "' " . ($menuindex == $sItems[0] ? "class='selected'" : "") . ">" . $menuitem[0] . "</a></li>";
            } else if ($menuitem[1] == $sItems[0]) {
                $submenu .= "<li><a href='" . SITE_ROOT . $sItems[0] . "&" . $menuindex . "' " . ($menuindex == $sItems[1] ? "class='selected'" : "") . ">" . $menuitem[0] . "</a></li>";
            }
        }
        $menu .= "</ul>";

        if ($submenu != "")
            $submenu = "<ul class=\"menu\">" . $submenu . "</ul>";

        return $menu . $submenu;
        ;
    }
}

Menu::setMenu();
?>